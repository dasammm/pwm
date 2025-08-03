<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'master_pelanggan';
    protected $tableJSON = 'json_pelanggan';
    protected $useTimestamps = true;
    protected $column_order = array();
    protected $column_search = array();
    protected $order = array('id' => 'asc');
    protected $request;
    protected $db;
    protected $dt;

    public function totalPelanggan()
    {
        $builder = $this->db->table('master_pelanggan');
        $query = $builder->countAll();
        return $query;
    }
    
    public function totalMasalah()
    {
        $builder = $this->db->table($this->tableJSON)->where('statuspintu', "terbuka");
        $query = $builder->countAllResults();
        return $query;
    }
    
    public function totalTransactions()
    {
        // Placeholder for actual transaction count
        // In a real application, this would query a transactions table
        return 1250;
    }
    
    public function getCustomerData($userId)
    {
        // For demonstration purposes, we'll return a random customer
        // In a real application, this would query based on the user ID
        $builder = $this->db->table($this->tableJSON);
        $query = $builder->get(1);
        return $query->getRow();
    }
    
    public function getMonthlyTransactions()
    {
        // Placeholder for actual monthly transaction data
        // In a real application, this would aggregate transaction data by month
        return [5000000, 8000000, 15000000, 12000000, 20000000, 18000000, 25000000, 30000000, 28000000, 32000000, 35000000, 40000000];
    }
    
    public function getUserDistribution()
    {
        // Placeholder for actual user distribution data
        // In a real application, this would count users by role
        $userModel = new UserModel();
        return [
            $userModel->where('role', 'admin')->countAllResults(),
            $userModel->where('role', 'client')->countAllResults(),
            $userModel->where('role', 'customer')->countAllResults()
        ];
    }
    
    public function getCustomerGrowth()
    {
        // Placeholder for actual customer growth data
        // In a real application, this would count new customers by month
        return [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160];
    }
    
    public function getCustomerStatus()
    {
        // Placeholder for actual customer status data
        // In a real application, this would count customers by status
        return [70, 20, 10]; // Active, Pending, Inactive
    }
    
    public function getMonthlyUsage($userId)
    {
        // Placeholder for actual monthly usage data
        // In a real application, this would aggregate usage data by month for a specific user
        return [50000, 60000, 55000, 58000, 62000, 65000, 70000, 68000, 72000, 75000, 80000, 85000];
    }
    
    public function getRecentTransactions($userId, $limit = 5)
    {
        // Placeholder for actual recent transactions
        // In a real application, this would query recent transactions for a specific user
        return [
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
    }

    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        // $this->dt = $this->db->table($this->table);
        $this->dt = $this->db->table($this->tableJSON);
    }

    private function _get_datatables_query()
    {
        $i = 0;
        $request = service('request');
        foreach ($this->column_search as $item) {
            if ($request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$request->getPost('order')['0']['column']], $request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $request = service('request');
        $this->_get_datatables_query();
        if ($request->getPost('length') != -1)
            $this->dt->limit($request->getPost('length'), $request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    
    public function count_all()
    {
        // $tbl_storage = $this->db->table($this->table);
        $tbl_storage = $this->db->table($this->tableJSON);
        return $tbl_storage->countAllResults();
    }
}
