<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    /**
     * Tampilkan halaman profil
     */
    public function index()
    {
        // Check if user is logged in
        if (!$this->session->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('auth/login'));
        }

        $data = [
            'user' => $user
        ];

        return view('profil', $data);
    }

    /**
     * Tampilkan halaman edit detail akun
     */
    public function edit()
    {
        // Check if user is logged in
        if (!$this->session->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('auth/login'));
        }

        $data = [
            'user' => $user
        ];

        return view('edit_detail_akun', $data);
    }

    /**
     * Update profil pengguna
     */
    public function update()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = $this->session->get('user_id');
        
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $no_tepl = $this->request->getPost('no_telp');

        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'no_telp' => 'permit_empty|numeric|min_length[10]|max_length[15]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // Update data
        $updateData = [
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $no_tepl
        ];

        $this->userModel->update($userId, $updateData);

        // Update session
        $user = $this->userModel->find($userId);
        $this->session->set('user', $user);

        return redirect()->to(base_url('profile'))->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Hapus akun pengguna
     */
    public function delete()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('auth/login'));
        }

        // Hapus dari database
        $this->userModel->delete($userId);

        // Destroy session
        $this->session->destroy();

        return redirect()->to(base_url('auth/login'))->with('success', 'Akun Anda telah dihapus');
    }
}
