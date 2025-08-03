<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\PulsaModel;
use App\Models\PulsaHistModel;
use Config\Services;

class Pulsa extends BaseController
{
    public function index()
    {
        return view('pulsa');
    }

    public function simpan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('json_pelanggan');

        $request = Services::request();
        $datamodel = new PulsaModel($request);
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $nominal = $request->getVar('nominal');
        $pulsaBeli = $nominal / 3.4;
        $data = [
            // 'nominal_add' => $request->getVar('nominal'),
            'nilaiup' => $pulsaBeli,
            'created_at' => $waktu->format('Y-m-d H:i:s'),
            'updated_at' => $waktu->format('Y-m-d H:i:s')
        ];


        $datamodel_hist = new PulsaHistModel($request);
        $waktu_hist = new Time('now', 'Asia/Jakarta', 'id_ID');
        $data_hist = [
            'nopelanggan' => $request->getVar('kode_pelanggan'),
            'pulsabeli' => $pulsaBeli,
            'tgltransaksi' => $waktu->format('Y-m-d H:i:s'),
            'created_at' => $waktu_hist->format('Y-m-d H:i:s'),
            'updated_at' => $waktu_hist->format('Y-m-d H:i:s')
        ];

        $kopel = $request->getVar('kode_pelanggan');

        try {
            $builder->where('nopelanggan', $kopel);
            $datamodel_hist->save($data_hist);
            $builder->update($data);
            // $datamodel->save($data);
            session()->setFlashdata('flash', 'dibeli');
            return redirect()->to('/pulsa');
        } catch (\Exception $e) {
            die($e->getMessage());
            // dd($datamodel);
            session()->setFlashdata('flash', 'gagal');
            return redirect()->to('/pulsa');
        }
    }
}
