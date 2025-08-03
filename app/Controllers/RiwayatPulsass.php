<?php
namespace App\Controllers;

use App\Models\PulsaHistModel;
use Config\Services;

class RiwayatPulsa extends BaseController
{
    public function index()
    {
        return view('riwayatpulsa');
    }

    public function hapus($no)
    {
        $request = Services::request();
        $datamodel = new PulsaHistModel($request);
        $datamodel->where('nopelanggan', $no)->delete();
        session()->setFlashdata('flash', 'dihapus');

        return redirect()->to('/riwayatpulsa');
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new PulsaHistModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nopelanggan;
                $row[] = $list->pulsabeli;
                $row[] = $list->tgltransaksi;
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
