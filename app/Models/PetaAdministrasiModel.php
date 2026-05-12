<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaAdministrasiModel extends Model
{
    protected $table            = 'peta_administrasi';
    protected $primaryKey       = 'id_peta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul_peta', 'data_spasial'];
}
