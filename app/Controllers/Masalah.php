<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\MasalahModel;
use Config\Services;

class Masalah extends BaseController
{
    public function index()
    {
        return view('masalah');
    }

    public function simpan()
    {
        $request = Services::request();
        $datamodel = new MasalahModel($request);
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $data = [
            'kode_masalah' => $request->getVar('kode_masalah'),
            'nama_masalah' => $request->getVar('nama_masalah'),
            'created_at' => $waktu->format('Y-m-d H:i:s'),
            'updated_at' => $waktu->format('Y-m-d H:i:s')
        ];
        try {
            $datamodel->save($data);
            session()->setFlashdata('flash', 'ditambahkan');
            return redirect()->to('/masalah');
        } catch (\Exception $e) {
            // die($e->getMessage());
            // dd($datamodel);
            session()->setFlashdata('flash', 'gagal');
            return redirect()->to('/masalah');
        }
    }

    public function hapus($no)
    {
        $request = Services::request();
        $datamodel = new MasalahModel($request);
        $datamodel->where('kode_masalah', $no)->delete();
        session()->setFlashdata('flash', 'dihapus');

        return redirect()->to('/masalah');
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new MasalahModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kode_masalah;
                $row[] = $list->nama_masalah;
                $row[] = "<form action=\"\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" name=\"detail\" class=\"btn btn-sm btn-outline-primary shadow-sm\" disabled><i class=\"fas fa-search fa-sm\"></i> Detail</button>
                          </form>
                          <form action=\"/masalah/hapus/" . $list->kode_masalah . "\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
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
