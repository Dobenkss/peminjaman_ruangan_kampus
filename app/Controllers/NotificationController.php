<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\Controller;

class NotificationController extends Controller
{
    protected $notifications = [];

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        // Inisialisasi objek NotificationModel
        $notificationModel = new NotificationModel();

        // Mengambil data notifikasi yang belum dibaca
        $this->notifications = $notificationModel->getUnreadNotifications();

        // Membagikan variabel $notifications ke semua tampilan
        view()->share('notifications', $this->notifications);
    }
}
