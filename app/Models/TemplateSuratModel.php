<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateSuratModel extends Model
{
    protected $table            = 'template_surat';
    protected $primaryKey       = 'id_template';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_jenis', 'nama_template', 'konten_template', 'fields_required'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTemplateByJenis($id_jenis)
    {
        return $this->where('id_jenis', $id_jenis)->first();
    }
}