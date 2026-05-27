<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'pesan';
    protected $primaryKey       = 'id_pesan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id_pengirim',
        'user_id_penerima',
        'judul',
        'isi_pesan',
        'tipe_pesan',
        'status_baca',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
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

    // Get unread messages for a user
    public function getPesanBelumDibaca($user_id)
    {
        return $this->where('user_id_penerima', $user_id)
                    ->where('status_baca', 'belum_dibaca')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    // Get all messages for a user (both personal and broadcast)
    public function getPesanUser($user_id)
    {
        return $this->where('user_id_penerima', $user_id)
                    ->orWhere('user_id_penerima', null)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    // Count unread messages
    public function countPesanBelumDibaca($user_id)
    {
        return $this->where('user_id_penerima', $user_id)
                    ->where('status_baca', 'belum_dibaca')
                    ->countAllResults();
    }

    // Mark message as read
    public function tandaiSudahDibaca($id_pesan)
    {
        return $this->update($id_pesan, ['status_baca' => 'sudah_dibaca']);
    }

    // Send message to specific user
    public function kirimPesan($user_id_pengirim, $user_id_penerima, $judul, $isi_pesan, $tipe_pesan = 'info')
    {
        return $this->insert([
            'user_id_pengirim' => $user_id_pengirim,
            'user_id_penerima' => $user_id_penerima,
            'judul' => $judul,
            'isi_pesan' => $isi_pesan,
            'tipe_pesan' => $tipe_pesan,
            'status_baca' => 'belum_dibaca'
        ]);
    }

    // Send broadcast message to all users
    public function kirimPesanBroadcast($user_id_pengirim, $judul, $isi_pesan, $tipe_pesan = 'info')
    {
        return $this->insert([
            'user_id_pengirim' => $user_id_pengirim,
            'user_id_penerima' => null,
            'judul' => $judul,
            'isi_pesan' => $isi_pesan,
            'tipe_pesan' => $tipe_pesan,
            'status_baca' => 'belum_dibaca'
        ]);
    }
}
