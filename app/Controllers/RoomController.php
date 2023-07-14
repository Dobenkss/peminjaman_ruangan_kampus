<?php

namespace App\Controllers;

use App\Models\RoomModel;
use CodeIgniter\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $roomModel = new RoomModel();
        $data['rooms'] = $roomModel->getRooms();

        return view('admin/room/index', $data);
    }

    public function create()
    {
        return view('admin/room/add_ruangan');
    }

    public function store()
    {
        $ruangan = $this->request->getPost('ruangan');
        $kapasitas = $this->request->getPost('kapasitas');
        $fasilitas = $this->request->getPost('fasilitas');

        // Mengelola file gambar yang diunggah
        $image = $this->request->getFile('image');
        $image_name = $image->getRandomName();
        $image->move('./public/uploads/rooms', $image_name);

        // Menyimpan data ke dalam database
        $roomModel = new RoomModel();
        $data = [
            'ruangan' => $ruangan,
            'kapasitas' => $kapasitas,
            'fasilitas' => $fasilitas,
            'image' => $image_name
        ];
        $roomModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/rooms')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $roomModel = new RoomModel();
        $data['room'] = $roomModel->getRoom($id);

        return view('admin/room/edit_ruangan', $data);
    }

    public function update($id)
    {
        $roomModel = new RoomModel();
        $data = [
            'ruangan' => $this->request->getPost('ruangan'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'fasilitas' => $this->request->getPost('fasilitas')
        ];
    
        // Cek apakah ada file gambar yang diunggah
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Pindahkan file gambar ke direktori yang diinginkan (misalnya: public/uploads)
            $newName = $image->getRandomName();
            $image->move('./public/uploads/rooms', $newName);
    
            // Simpan nama file gambar ke dalam array data
            $data['image'] = $newName;
        }
    
        $roomModel->updateRoom($id, $data);
    
        if ($roomModel->db->affectedRows() > 0) {
            // Jika berhasil, set notifikasi berhasil menggunakan flash session
            session()->setFlashdata('success', 'Data ruangan berhasil diupdate.');
        }
    
        return redirect()->to('/rooms');
    }
    

    public function delete($id)
    {
        $roomModel = new RoomModel();
        $roomModel->deleteRoom($id);

        if ($roomModel->db->affectedRows() > 0) {
            // Jika berhasil, set notifikasi berhasil menggunakan flash session
            session()->setFlashdata('delete', 'Data ruangan berhasil dihapus.');
        }

        return redirect()->to('/rooms');
    }
}
