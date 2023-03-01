<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T30Jurnal extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "nomor" => null,
        "tanggal" => null,
        "keterangan" => null,
    ];
    protected $casts = [];
}
