<?php

namespace App\Controllers;

use App\Models\HomeModel;
use Config\Services;

class Home extends BaseController
{
	public function index()
	{
		$request = Services::request();
		$datamodel = new HomeModel($request);
		$data = [
			'jmlPelanggan' => $datamodel->totalPelanggan(),
			'totalMasalah' => $datamodel->totalMasalah(),
			'refresh' => 'refresh'
		];
		return view('index', $data);
	}

	public function hapus($id)
	{
		$request = Services::request();
		$datamodel = new HomeModel($request);
		$datamodel->where('id', $id)->delete();
		session()->setFlashdata('flash', 'dihapus');

		return redirect()->to('/');
	}

	public function listdata()
	{
		$request = Services::request();
		$datamodel = new HomeModel($request);
		if ($request->getMethod(true) == 'POST') {
			$lists = $datamodel->get_datatables();
			$data = [];
			$no = $request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				// $row[] = $list->no_pelanggan;
				// $row[] = $list->nama_pelanggan;
				// $statusID = $list->status_pelanggan;
				// if ($statusID == "OK") {
				// 	// $row[] = $statusku;
				// 	$row[] = "<div class=\"bg-success text-white rounded\">OK</div>";
				// } else {
				// 	$row[] = "<div class=\"bg-danger text-white rounded\">OK</div>";
				// }
				// $statusDev = $list->status_device;
				// if ($statusDev == "OK") {
				// 	// $row[] = $statusku;
				// 	$row[] = "<div class=\"bg-success text-white rounded\">OK</div>";
				// } else {
				// 	$row[] = "<div class=\"bg-danger text-white rounded\">OK</div>";
				// }
				// $row[] = "<form action=\"\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
    //                         <?= csrf_field(); ?
    //                         <button type=\"submit\" name=\"detail\" class=\"btn btn-sm btn-outline-primary shadow-sm\"><i class=\"fas fa-search fa-sm\"></i> Detail</button>
    //                       </form>
    //                       <form action=\"/home/hapus/" . $list->id . "\" method=\"POST\" name=\"detail\" class=\"d-inline-block\">
    //                         <?= csrf_field(); ?
    //                         <button type=\"submit\" name=\"hapus\" value=\"Hapus\" class=\"btn btn-sm btn-outline-danger shadow-sm tombol-hapus\"><i class=\"fas fa-trash fa-sm\"></i> Hapus</button>
    //                       </form>";
                $row[] = $list->nopelanggan;
				$row[] = $list->namapelanggan;
				$row[] = "Rp. " . $list->nilai;
				$statusID = "OK";
				if ($statusID == "OK") {
					$row[] = "<div class=\"bg-success text-white rounded\">OK</div>";
				} else {
					$row[] = "<div class=\"bg-danger text-white rounded\">Error</div>";
				}
				$statusDev = $list->statuspintu;
				if ($statusDev == "terbuka") {
					// $row[] = $statusku;
					$row[] = "<div class=\"bg-danger text-white rounded\">Pintu Terbuka</div>";
				} else {
					$row[] = "<div class=\"bg-success text-white rounded\">Pintu Tertutup</div>";
				}
				$row[] = $list->pembaruan;
				
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
