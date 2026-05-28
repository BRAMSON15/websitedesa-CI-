<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToPenduduk extends Migration
{
    public function up()
    {
        // Add timestamps to penduduk table if they don't exist
        $fields = $this->db->getFieldData('penduduk');
        $hasCreatedAt = false;
        $hasUpdatedAt = false;
        
        foreach ($fields as $field) {
            if ($field->name === 'created_at') $hasCreatedAt = true;
            if ($field->name === 'updated_at') $hasUpdatedAt = true;
        }
        
        if (!$hasCreatedAt || !$hasUpdatedAt) {
            $this->forge->addColumn('penduduk', [
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'after' => 'nomor_kk',
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'after' => 'created_at',
                ],
            ]);
        }
    }

    public function down()
    {
        // Drop timestamps if they exist
        $fields = $this->db->getFieldData('penduduk');
        $hasCreatedAt = false;
        $hasUpdatedAt = false;
        
        foreach ($fields as $field) {
            if ($field->name === 'created_at') $hasCreatedAt = true;
            if ($field->name === 'updated_at') $hasUpdatedAt = true;
        }
        
        if ($hasCreatedAt || $hasUpdatedAt) {
            $this->forge->dropColumn('penduduk', ['created_at', 'updated_at']);
        }
    }
}
