<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'message', 'status', 'create_at', 'user_id'];

    // Tambahkan method untuk mengambil notifikasi yang belum dibaca
    public function getUnreadNotifications()
    {
        return $this->where('status', 'unread')->findAll();
    }

    // Tambahkan method untuk menandai notifikasi sebagai sudah dibaca
    public function markAsRead($notificationId)
    {
        $this->update($notificationId, ['status' => 'read']);
    }
}
