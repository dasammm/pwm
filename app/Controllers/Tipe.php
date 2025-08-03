<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\TipeModel;
use Config\Services;

class Tipe extends BaseController
{
    public function index()
    {
        return view('tipe');
    }

    public function simpan()
    {
        $request = Services::request();
        $datamodel = new TipeModel($request);
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $data = [
            'kode_tipe' => $request->getVar('kode_tipe'),
            'nama_tipe' => $request->getVar('nama_tipe'),
            'created_at' => $waktu->format('Y-m-d H:i:s'),
            'updated_at' => $waktu->format('Y-m-d H:i:s')
        ];
        try {
            $datamodel->save($data);
            session()->setFlashdata('flash', 'ditambahkan');
            return redirect()->to('/tipe');
        } catch (\Exception $e) {
            // die($e->getMessage());
            // dd($datamodel);
            session()->setFlashdata('flash', 'gagal');
            return redirect()->to('/tipe');
        }
    }

    public function hapus($no)
    {
        $request = Services::request();
        $datamodel = new TipeModel($request);
        $datamodel->where('kode_tipe', $no)->delete();
        session()->setFlashdata('flash', 'dihapus');

        return redirect()->to('/tipe');
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new TipeModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kode_tipe;
                $row[] = $list->nama_tipe;
                $row[] = "<form action=\"\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" name=\"detail\" class=\"btn btn-sm btn-outline-primary shadow-sm\" disabled><i class=\"fas fa-search fa-sm\"></i> Detail</button>
                          </form>
                          <form action=\"\" method=\"POST\" name=\"edit\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" name=\"edit\" class=\"btn btn-sm btn-outline-warning shadow-sm\"><i class=\"fas fa-pen fa-sm\"></i> Edit</button>
                          </form>
                          <form action=\"/tipe/hapus/" . $list->kode_tipe . "\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" data-target=\"#delete\" name=\"hapus\" value=\"Hapus\" class=\"btn btn-sm btn-outline-danger shadow-sm tombol-hapus\"><i class=\"fas fa-trash fa-sm\"></i> Hapus</button>
                          </form>";
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
}
