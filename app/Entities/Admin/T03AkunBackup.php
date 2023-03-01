<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T03AkunBackup extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "akun" => null,
        "debet" => null,
        "kredit" => null,
        "kode_tahun" => null,
    ];
    protected $casts = [
        "akun" => "int",
        "debet" => "float",
        "kredit" => "float",
    ];
}
