<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T00GrupAkun extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "kode" => null,
        "nama" => null,
    ];
    protected $casts = [];
}
