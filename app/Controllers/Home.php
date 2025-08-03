<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\UserModel;
use Config\Services;

class Home extends BaseController
{
	public function index()
	{
		$request = Services::request();
		$datamodel = new HomeModel($request);
		$userModel = new UserModel();
		
		// Get user role from session
		$role = session()->get('role');
		
		// Common data for all dashboards
		$data = [
			'jmlPelanggan' => $datamodel->totalPelanggan(),
			'totalMasalah' => $datamodel->totalMasalah(),
			'refresh' => 'refresh'
		];
		
		// Role-specific dashboard data
		if ($role == 'admin') {
			// Admin-specific data
			$data['totalUsers'] = $userModel->countAll();
			$data['totalTransactions'] = $datamodel->totalTransactions();
			$data['monthlyTransactions'] = [5000000, 8000000, 15000000, 12000000, 20000000, 18000000, 25000000, 30000000, 28000000, 32000000, 35000000, 40000000];
			$data['userDistribution'] = [
				$userModel->where('role', 'admin')->countAllResults(),
				$userModel->where('role', 'client')->countAllResults(),
				$userModel->where('role', 'customer')->countAllResults()
			];
			
			return view('dashboard/admin/index', $data);
		} 
		elseif ($role == 'client') {
			// Client-specific data
			$data['totalCustomers'] = $userModel->where('role', 'customer')->countAllResults();
			$data['customerGrowth'] = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160];
			$data['customerStatus'] = [70, 20, 10]; // Active, Pending, Inactive
			
			return view('dashboard/client/index', $data);
		}
		elseif ($role == 'customer') {
			// Customer-specific data
			$userId = session()->get('user_id');
			$customerData = $datamodel->getCustomerData($userId);
			
			$data['accountStatus'] = 'active'; // Default value, replace with actual data
			$data['pulsaBalance'] = $customerData->nilai ?? 0;
			$data['doorStatus'] = $customerData->statuspintu ?? 'tertutup';
			$data['monthlyUsage'] = [50000, 60000, 55000, 58000, 62000, 65000, 70000, 68000, 72000, 75000, 80000, 85000];
			$data['recentTransactions'] = [
				[
					'tanggal' => '2025-08-01',
					'jenis' => 'Top Up',
					'jumlah' => 100000,
					'status' => 'success'
				],
				[
					'tanggal' => '2025-07-25',
					'jenis' => 'Pembayaran',
					'jumlah' => 50000,
					'status' => 'success'
				],
				[
					'tanggal' => '2025-07-15',
					'jenis' => 'Top Up',
					'jumlah' => 200000,
					'status' => 'success'
				],
				[
					'tanggal' => '2025-07-05',
					'jenis' => 'Pembayaran',
					'jumlah' => 75000,
					'status' => 'success'
				]
			];
			
			return view('dashboard/customer/index', $data);
		}
		else {
			// Default dashboard for guests or undefined roles
			return view('index', $data);
		}
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
		$role = session()->get('role');
		
		if ($request->getMethod(true) == 'POST') {
			$lists = $datamodel->get_datatables();
			$data = [];
			$no = $request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
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
					$row[] = "<div class=\"bg-danger text-white rounded\">Pintu Terbuka</div>";
				} else {
					$row[] = "<div class=\"bg-success text-white rounded\">Pintu Tertutup</div>";
				}
				$row[] = $list->pembaruan;
				
				// Add action buttons for admin role
				if ($role == 'admin') {
					$row[] = "<a href=\"/pelanggan/detail/" . $list->id . "\" class=\"btn btn-sm btn-info\"><i class=\"fas fa-search fa-sm\"></i> Detail</a> " .
							"<a href=\"/pelanggan/edit/" . $list->id . "\" class=\"btn btn-sm btn-primary\"><i class=\"fas fa-edit fa-sm\"></i> Edit</a> " .
							"<a href=\"/home/hapus/" . $list->id . "\" class=\"btn btn-sm btn-danger tombol-hapus\"><i class=\"fas fa-trash fa-sm\"></i> Hapus</a>";
				}
				
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
