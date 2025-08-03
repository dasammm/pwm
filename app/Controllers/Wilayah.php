<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\WilayahModel;
use Config\Services;

class Wilayah extends BaseController
{
    public function index()
    {
        return view('wilayah');
    }

    public function simpan()
    {
        $request = Services::request();
        $datamodel = new WilayahModel($request);
        $waktu = new Time('now', 'Asia/Jakarta', 'id_ID');
        $data = [
            'kode_wilayah' => $request->getVar('kode_wilayah'),
            'nama_wilayah' => $request->getVar('nama_wilayah'),
            'kota' => $request->getVar('kota'),
            'created_at' => $waktu->format('Y-m-d H:i:s'),
            'updated_at' => $waktu->format('Y-m-d H:i:s')
        ];
        try {
            $datamodel->save($data);
            session()->setFlashdata('flash', 'ditambahkan');
            return redirect()->to('/wilayah');
        } catch (\Exception $e) {
            // die($e->getMessage());
            // dd($datamodel);
            session()->setFlashdata('flash', 'gagal');
            return redirect()->to('/wilayah');
        }
    }

    public function hapus($no)
    {
        $request = Services::request();
        $datamodel = new WilayahModel($request);
        $datamodel->where('kode_wilayah', $no)->delete();
        session()->setFlashdata('flash', 'dihapus');

        return redirect()->to('/wilayah');
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new WilayahModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kode_wilayah;
                $row[] = $list->nama_wilayah;
                $row[] = $list->kota;
                $row[] = "<form action=\"\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" name=\"detail\" class=\"btn btn-sm btn-outline-primary shadow-sm\" disabled><i class=\"fas fa-search fa-sm\"></i> Detail</button>
                          </form>
                          <form action=\"/wilayah/hapus/" . $list->kode_wilayah . "\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
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
