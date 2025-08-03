<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\LiveModel;
use Config\Services;

class DataLive extends BaseController
{
    public function index()
    {
        $request = Services::request();
        $datamodel = new LiveModel($request);
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $data = [
            'no_pelanggan' => $request->getGet('np'),
            'nama_pelanggan' => $request->getGet('km'),
            'data_air' => $request->getGet('da'),
            'data_pulsa' => $request->getGet('dp'),
            'status' => $request->getGet('s'),
            'created_at' => $waktu->format('Y-m-d H:i:s'),
            'updated_at' => $waktu->format('Y-m-d H:i:s')
        ];
        $datamodel->save($data);
        session()->setFlashdata('flash', 'ditambahkan');
        return redirect()->to('/');
    }
}
