<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T33JurnalLamad extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "jurnal" => null,
        "akun" => null,
        "debet" => null,
        "kredit" => null,
    ];
    protected $casts = [
        "jurnal" => "int",
        "akun" => "int",
        "debet" => "float",
        "kredit" => "float",
    ];
}
