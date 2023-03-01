<?php
namespace App\Models\Admin;

class T03AkunBackupModel extends \App\Models\GoBaseModel
{
    protected $table = "t03_akun_backup";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["akun", "debet", "kredit", "kode_tahun"];
    protected $returnType = "App\Entities\Admin\T03AkunBackup";

    public static $labelField = "akun";

    protected $validationRules = [
        "akun" => [
            "label" => "T03AkunBackups.akun",
            "rules" => "required|integer|is_unique[t03_akun_backup.akun,id,{id}]",
        ],
        "debet" => [
            "label" => "T03AkunBackups.debet",
            "rules" => "required|decimal",
        ],
        "kode_tahun" => [
            "label" => "T03AkunBackups.kodeTahun",
            "rules" => "trim|required|max_length[2]",
        ],
        "kredit" => [
            "label" => "T03AkunBackups.kredit",
            "rules" => "required|decimal",
        ],
    ];

    protected $validationMessages = [
        "akun" => [
            "integer" => "T03AkunBackups.validation.akun.integer",
            "is_unique" => "T03AkunBackups.validation.akun.is_unique",
            "required" => "T03AkunBackups.validation.akun.required",
        ],
        "debet" => [
            "decimal" => "T03AkunBackups.validation.debet.decimal",
            "required" => "T03AkunBackups.validation.debet.required",
        ],
        "kode_tahun" => [
            "max_length" => "T03AkunBackups.validation.kode_tahun.max_length",
            "required" => "T03AkunBackups.validation.kode_tahun.required",
        ],
        "kredit" => [
            "decimal" => "T03AkunBackups.validation.kredit.decimal",
            "required" => "T03AkunBackups.validation.kredit.required",
        ],
    ];
}
