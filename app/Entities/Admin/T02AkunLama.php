<?php
namespace App\Entities\Admin;

use CodeIgniter\Entity;

class T02AkunLama extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id" => null,
        "grup_akun" => null,
        "kode" => null,
        "nama" => null,
        "debet_lalu" => null,
        "kredit_lalu" => null,
        "debet_ini" => null,
        "kredit_ini" => null,
        "bulan_tahun" => null,
    ];
    protected $casts = [
        "grup_akun" => "int",
        "debet_lalu" => "float",
        "kredit_lalu" => "float",
        "debet_ini" => "float",
        "kredit_ini" => "float",
    ];
}
