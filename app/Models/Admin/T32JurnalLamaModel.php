<?php
namespace App\Models\Admin;

class T32JurnalLamaModel extends \App\Models\GoBaseModel
{
    protected $table = "t32_jurnal_lama";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nomor", "tanggal", "keterangan", "bulan_tahun"];
    protected $returnType = "App\Entities\Admin\T32JurnalLama";

    public static $labelField = "nomor";

    protected $validationRules = [
        "bulan_tahun" => [
            "label" => "T32JurnalLamas.bulanTahun",
            "rules" => "trim|max_length[4]",
        ],
        "keterangan" => [
            "label" => "T32JurnalLamas.keterangan",
            "rules" => "trim|required|max_length[16313]",
        ],
        "nomor" => [
            "label" => "T32JurnalLamas.nomor",
            "rules" => "trim|required|max_length[8]",
        ],
        "tanggal" => [
            "label" => "T32JurnalLamas.tanggal",
            "rules" => "required|valid_date",
        ],
    ];

    protected $validationMessages = [
        "bulan_tahun" => [
            "max_length" => "T32JurnalLamas.validation.bulan_tahun.max_length",
        ],
        "keterangan" => [
            "max_length" => "T32JurnalLamas.validation.keterangan.max_length",
            "required" => "T32JurnalLamas.validation.keterangan.required",
        ],
        "nomor" => [
            "max_length" => "T32JurnalLamas.validation.nomor.max_length",
            "required" => "T32JurnalLamas.validation.nomor.required",
        ],
        "tanggal" => [
            "required" => "T32JurnalLamas.validation.tanggal.required",
            "valid_date" => "T32JurnalLamas.validation.tanggal.valid_date",
        ],
    ];
}
