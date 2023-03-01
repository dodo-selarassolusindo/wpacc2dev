<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T34JurnalBackup extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "nomor" => null,
        "tanggal" => null,
        "keterangan" => null,
        "bulan_tahun" => null,
    ];
    protected $casts = [];
}
