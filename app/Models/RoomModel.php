<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ruangan', 'kapasitas', 'fasilitas', 'image'];

    public function getRooms()
    {
        return $this->findAll();
    }

    public function getRoom($id)
    {
        return $this->find($id);
    }

    public function addRoom($data)
    {
        return $this->insert($data);
    }

    public function updateRoom($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRoom($id)
    {
        return $this->delete($id);
    }
}
