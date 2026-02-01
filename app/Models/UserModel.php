<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'no_telp', 'foto_profil', 'role','reset_token', 'reset_expired'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Get user by email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
    
    // Get user with role
    public function getUserWithRole($userId)
    {
        return $this->select('id, nama, email, no_telp, role, foto_profil')
                    ->find($userId);
    }
}