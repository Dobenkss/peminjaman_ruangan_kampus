<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'room_id', 'date_request', 'start_time', 'end_time', 'tujuan', 'status', 'no_wa'];

    public function getBookings()
    {
        $db = db_connect();

        $query = $db->table($this->table)
            ->select($this->table . '.*, rooms.ruangan')
            ->join('rooms', 'rooms.id = ' . $this->table . '.room_id', 'left')
            ->get();

        return $query->getResultArray();
    }

    public function getBookingsForNotification()
    {
        return $this->where('is_notified', 0)->findAll();
    }

    // Fungsi untuk memperbarui status notifikasi peminjaman ruangan
    public function markAsNotified($bookingId)
    {
        $this->update($bookingId, ['is_notified' => 1]);
    }
}
