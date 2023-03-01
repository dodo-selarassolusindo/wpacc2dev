<?php
namespace App\Models\Admin;

class T34JurnalBackupModel extends \App\Models\GoBaseModel
{
    protected $table = "t34_jurnal_backup";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["nomor", "tanggal", "keterangan", "bulan_tahun"];
    protected $returnType = "App\Entities\Admin\T34JurnalBackup";

    public static $labelField = "nomor";

    protected $validationRules = [
        "bulan_tahun" => [
            "label" => "T34JurnalBackups.bulanTahun",
            "rules" => "trim|max_length[4]",
        ],
        "keterangan" => [
            "label" => "T34JurnalBackups.keterangan",
            "rules" => "trim|required|max_length[16313]",
        ],
        "nomor" => [
            "label" => "T34JurnalBackups.nomor",
            "rules" => "trim|required|max_length[8]",
        ],
        "tanggal" => [
            "label" => "T34JurnalBackups.tanggal",
            "rules" => "required|valid_date",
        ],
    ];

    protected $validationMessages = [
        "bulan_tahun" => [
            "max_length" => "T34JurnalBackups.validation.bulan_tahun.max_length",
        ],
        "keterangan" => [
            "max_length" => "T34JurnalBackups.validation.keterangan.max_length",
            "required" => "T34JurnalBackups.validation.keterangan.required",
        ],
        "nomor" => [
            "max_length" => "T34JurnalBackups.validation.nomor.max_length",
            "required" => "T34JurnalBackups.validation.nomor.required",
        ],
        "tanggal" => [
            "required" => "T34JurnalBackups.validation.tanggal.required",
            "valid_date" => "T34JurnalBackups.validation.tanggal.valid_date",
        ],
    ];
}
