<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\UserModel;
use App\Models\BookingModel;
use CodeIgniter\Session\Session;
use App\Models\NotificationModel;
use App\Controllers\NotificationController;

class BookingController extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->getBookings();

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'bookings' => $bookings,
            'users' => $users
        ];

        return view('admin/booking/index', $data);
    }

    public function listRooms()
    {
        $roomModel = new RoomModel;
        $data['rooms'] = $roomModel->findAll();
        return view('anggota/booking', $data);
    }

    public function RegistrationForm($id)
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->find($id);

        return view('anggota/register_booking', $data);
    }

    public function register()
    {
        // Memeriksa apakah pengguna sudah login sebagai member
        if (!session()->has('anggota')) {
            return redirect()->to('/');
        }

        // Dapatkan data user_id dari sesi anggota
        $user_id = session('anggota')['id'];

        // Mengambil data dari formulir
        $date_request = $this->request->getPost('date_request');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $room_id = $this->request->getPost('room_id');
        $tujuan = $this->request->getPost('tujuan');
        $no_wa = $this->request->getPost('no_wa');

        // Memasukkan permintaan peminjaman ke dalam database
        $bookingModel = new BookingModel();
        $status = "pending";
        $data = [
            'user_id' => $user_id,
            'room_id' => $room_id,
            'date_request' => $date_request,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'tujuan' => $tujuan,
            'status' => $status,
            'no_wa' => $no_wa
        ];

        $bookingModel->insert($data);

        return redirect()->to('booking/list')->with('success', 'Reservasi Berhasil! Silahkan Tunggu Konfirmasi dari Admin.');
    }

    public function updateStatus($id, $newStatus)
    {
        // Memeriksa apakah pengguna sudah login sebagai admin
        if (!session()->has('admin')) {
            return redirect()->to('/'); // Ganti '/' dengan URL halaman login yang sesuai
        }

        // Memperbarui status peminjaman
        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $booking['status'] = $newStatus;
        $bookingModel->update($id, $booking);

        $message = '';
        if ($newStatus === 'approved') {
            $message = 'Surat Peminjangan Ruangan telah diapprove, silahkan unduh surat peminjaman berikut: (link docs)';
        } elseif ($newStatus === 'rejected') {
            $message = 'Surat Peminjangan Ruangan telah ditolak dikarenakan (alasan). Silahkan lakukan kembali peminjaman ruangan dengan benar dan sesuai.';
        }

        // Redirect ke aplikasi WhatsApp dengan menggunakan URL whatsapp://send?phone=<nomor_wa>
        $whatsappURL = 'https://wa.me/' . $booking['no_wa'] . '?text=' . urlencode($message); // Ganti 'https://wa.me/' dengan URL WhatsApp yang sesuai
        return redirect()->to($whatsappURL);
    }
}
