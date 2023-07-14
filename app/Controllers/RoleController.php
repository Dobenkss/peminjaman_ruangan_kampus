<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    /**
     * @checkAnggota
     */
    public function admin()
    {
        return view('admin/dashboard');
    }

    public function anggota()
    {
        return view('anggota/dashboard');
    }
}
