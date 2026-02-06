<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PemesananModel;

class User extends BaseController
{
    protected $userModel;
    protected $pemesananModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pemesananModel = new PemesananModel();
        $this->session = \Config\Services::session();
    }

    // Ambil user dari session (simple)
    private function resolveSessionUser(): ?array
    {
        $userId = $this->session->get('user_id');

        if (!$userId) {
            return null;
        }

        return $this->userModel->find($userId);
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

        $rules = [
            'nama'    => 'required|min_length[3]',
            'email'   => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'no_telp' => 'permit_empty|numeric|min_length[10]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama'    => $this->request->getPost('nama'),
            'email'   => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
        ];

        $this->userModel->update($userId, $data);

        // update session
        $this->session->set([
            'nama'  => $data['nama'],
            'email' => $data['email'],
        ]);

        return redirect()->to('/profile/edit')->with('success', 'Profil berhasil diupdate!');
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

        $this->userModel->delete($user['id']);
        $this->session->destroy();

        return redirect()->to('/')->with('success', 'Akun berhasil dihapus');
    }

    public function histori()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('auth/login');
        }

        $user = $this->resolveSessionUser();
        if (!$user) {
            return redirect()->to('auth/login');
        }

        $histori = $this->pemesananModel->getHistoriByUser($user['id']);

        $data = [
            'user' => $user,
            'histori' => $histori
        ];

        return view('histori', $data);
    }
}