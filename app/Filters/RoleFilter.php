<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // If no specific role is required, allow access
        if (empty($arguments)) {
            return;
        }

        // Check if user has the required role
        $userRole = session()->get('role');
        
        // If user role is in the allowed roles list, allow access
        if (in_array($userRole, $arguments)) {
            return;
        }

        // If not, redirect to dashboard with error message
        session()->setFlashdata('error', 'You do not have permission to access this page.');
        return redirect()->to('/');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after the controller is executed
    }
}