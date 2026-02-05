<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PemesananModel;


class User extends BaseController
{
    protected $userModel;
    protected $session;
    protected $pemesananModel;

    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->pemesananModel = new PemesananModel();

    }

    private function resolveSessionUser(): ?array
    {
        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        $userId = $user['id'];
        $userEmail = $this->session->get('email');

        $user = null;
        if ($userId) {
            $user = $this->userModel->find($userId);
        }

        if ($user && $userEmail && $user['email'] !== $userEmail) {
            $user = $this->userModel->where('email', $userEmail)->first();
        }

        if (!$user && $userEmail) {
            $user = $this->userModel->where('email', $userEmail)->first();
        }

        return $user ?: null;
    }
    
    public function profil()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('auth/login');
        }
        
        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        return view('profil', ['user' => $user]);
    }

    public function detailAkun()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('auth/login');
        }

        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        return view('edit_detail_akun', ['user' => $user]);
    }
    
    public function updateProfil()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('auth/login');
        }
        
        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        $userId = $user['id'];
        
        $validation = \Config\Services::validation();
        
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'no_telp' => 'permit_empty|numeric|min_length[10]|max_length[15]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp')
        ];
        
        $this->userModel->update($userId, $data);
        
        // Update session data
        $this->session->set('nama', $data['nama']);
        $this->session->set('email', $data['email']);
        
        return redirect()
        ->to('/profile/edit')
        ->with('success', 'Profil berhasil diupdate!');
    }
    
    public function deleteAccount()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('auth/login');
        }
        
        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        $userId = $user['id'];
        
        // Hapus user dari database
        $this->userModel->delete($userId);
        
        // Destroy session
        $this->session->destroy();
        
        return redirect()->to('/')->with('success', 'Akun berhasil dihapus');
    }

    public function histori()
    {
        $userId = $this->session->get('user_id');
        
        // Ambil semua pemesanan user ini dari database
        $histori = $this->pemesananModel->getHistoriByUser($userId);
        
        $data = [
            'user' => [
                'nama' => $this->session->get('nama'),
                'email' => $this->session->get('email')
            ],
            'histori' => $histori
        ];
        
        return view('histori', $data);
    }

}
