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
        $telepon = $this->request->getPost('telepon');

        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'telepon' => 'permit_empty|numeric|min_length[10]|max_length[15]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // Update data
        $updateData = [
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon
        ];

        $this->userModel->update($userId, $updateData);

        // Update session
        $user = $this->userModel->find($userId);
        $this->session->set('user', $user);

        return redirect()->to(base_url('profile'))->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Halaman ubah password
     */
    public function changePassword()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('auth/login'));
        }

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validasi
        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            return redirect()->back()->with('error', 'Semua field harus diisi');
        }

        // Cek password lama
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai. Silakan gunakan fitur Lupa Sandi di halaman login');
        }

        // Cek password baru
        if (strlen($newPassword) < 6) {
            return redirect()->back()->with('error', 'Password baru minimal 6 karakter');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sesuai');
        }

        // Update password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->userModel->update($userId, ['password' => $hashedPassword]);

        return redirect()->to(base_url('profile'))->with('success', 'Password berhasil diubah');
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
