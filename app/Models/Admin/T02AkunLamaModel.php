<?php
namespace App\Models\Admin;

class T02AkunLamaModel extends \App\Models\GoBaseModel
{
    protected $table = "t02_akun_lama";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        "grup_akun",
        "kode",
        "nama",
        "debet_lalu",
        "kredit_lalu",
        "debet_ini",
        "kredit_ini",
        "bulan_tahun",
    ];
    protected $returnType = "App\Entities\Admin\T02AkunLama";

    public static $labelField = "nama";

    protected $validationRules = [
        "bulan_tahun" => [
            "label" => "T02AkunLamas.bulanTahun",
            "rules" => "trim|required|max_length[4]",
        ],
        "debet_ini" => [
            "label" => "T02AkunLamas.debetIni",
            "rules" => "required|decimal",
        ],
        "debet_lalu" => [
            "label" => "T02AkunLamas.debetLalu",
            "rules" => "required|decimal",
        ],
        "grup_akun" => [
            "label" => "T02AkunLamas.grupAkun",
            "rules" => "required|integer",
        ],
        "kode" => [
            "label" => "T02AkunLamas.kode",
            "rules" => "trim|required|max_length[4]",
        ],
        "kredit_ini" => [
            "label" => "T02AkunLamas.kreditIni",
            "rules" => "required|decimal",
        ],
        "kredit_lalu" => [
            "label" => "T02AkunLamas.kreditLalu",
            "rules" => "required|decimal",
        ],
        "nama" => [
            "label" => "T02AkunLamas.nama",
            "rules" => "trim|required|max_length[50]",
        ],
    ];

    protected $validationMessages = [
        "bulan_tahun" => [
            "max_length" => "T02AkunLamas.validation.bulan_tahun.max_length",
            "required" => "T02AkunLamas.validation.bulan_tahun.required",
        ],
        "debet_ini" => [
            "decimal" => "T02AkunLamas.validation.debet_ini.decimal",
            "required" => "T02AkunLamas.validation.debet_ini.required",
        ],
        "debet_lalu" => [
            "decimal" => "T02AkunLamas.validation.debet_lalu.decimal",
            "required" => "T02AkunLamas.validation.debet_lalu.required",
        ],
        "grup_akun" => [
            "integer" => "T02AkunLamas.validation.grup_akun.integer",
            "required" => "T02AkunLamas.validation.grup_akun.required",
        ],
        "kode" => [
            "max_length" => "T02AkunLamas.validation.kode.max_length",
            "required" => "T02AkunLamas.validation.kode.required",
        ],
        "kredit_ini" => [
            "decimal" => "T02AkunLamas.validation.kredit_ini.decimal",
            "required" => "T02AkunLamas.validation.kredit_ini.required",
        ],
        "kredit_lalu" => [
            "decimal" => "T02AkunLamas.validation.kredit_lalu.decimal",
            "required" => "T02AkunLamas.validation.kredit_lalu.required",
        ],
        "nama" => [
            "max_length" => "T02AkunLamas.validation.nama.max_length",
            "required" => "T02AkunLamas.validation.nama.required",
        ],
    ];
}
