<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use Config\Services;

class Pelanggan extends BaseController
{
    public function index()
    {
        return view('pelanggan');
    }

    public function hapus($no)
    {
        $request = Services::request();
        $datamodel = new PelangganModel($request);
        $datamodel->where('no_pelanggan', $no)->delete();
        session()->setFlashdata('flash', 'dihapus');

        return redirect()->to('/pelanggan');
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new PelangganModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->no_pelanggan;
                $row[] = $list->nama_pelanggan;
                $row[] = $list->alamat_pelanggan;
                $row[] = $list->kota_pelanggan;
                $row[] = $list->nomor_telepon;
                $row[] = $list->tipe;
                $row[] = $list->nominal;
                // $row[] = $list->nominal_add;
                $row[] = $list->volume;
                $row[] = $list->status_pelanggan;
                $row[] = $list->status_device;
                $row[] = "<form action=\"\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
                            <?= csrf_field(); ?>
                            <button type=\"submit\" name=\"detail\" class=\"btn btn-sm btn-outline-primary shadow-sm\" disabled><i class=\"fas fa-search fa-sm\"></i> Detail</button>
                          </form>
                          <form action=\"/pelanggan/hapus/" . $list->no_pelanggan . "\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
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
