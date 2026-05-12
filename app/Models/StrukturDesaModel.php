<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturDesaModel extends Model
{
    protected $table            = 'struktur_desa';
    protected $primaryKey       = 'id_struktur';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'jabatan', 'foto'];
}
