<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotoProfileModel extends Model
{
    // protected $table            = 'photo_profile';
    // protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // protected $allowedFields    = [];

    protected $table = 'photo_profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'photo_profile', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Relasi dengan tabel users
    // protected $returnType = 'object';

    public function user($userId)
    {
        // Mendefinisikan relasi manual dengan tabel users
        return $this->db->table('photo_profile')
                        ->select('photo_profile.photo_profile, users.*')
                        ->join('users', 'users.id = photo_profile.id_user', 'left')
                        ->where('users.id', $userId)
                        ->get()
                        ->getResultArray();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    // protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
