<?php
namespace App\Models\Admin;

class T35JurnalBackupdModel extends \App\Models\GoBaseModel
{
    protected $table = "t35_jurnal_backupd";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["jurnal", "akun", "debet", "kredit"];
    protected $returnType = "App\Entities\Admin\T35JurnalBackupd";

    public static $labelField = "jurnal";

    protected $validationRules = [
        "akun" => [
            "label" => "T35JurnalBackupds.akun",
            "rules" => "required|integer",
        ],
        "debet" => [
            "label" => "T35JurnalBackupds.debet",
            "rules" => "required|decimal",
        ],
        "jurnal" => [
            "label" => "T35JurnalBackupds.jurnal",
            "rules" => "required|integer",
        ],
        "kredit" => [
            "label" => "T35JurnalBackupds.kredit",
            "rules" => "required|decimal",
        ],
    ];

    protected $validationMessages = [
        "akun" => [
            "integer" => "T35JurnalBackupds.validation.akun.integer",
            "required" => "T35JurnalBackupds.validation.akun.required",
        ],
        "debet" => [
            "decimal" => "T35JurnalBackupds.validation.debet.decimal",
            "required" => "T35JurnalBackupds.validation.debet.required",
        ],
        "jurnal" => [
            "integer" => "T35JurnalBackupds.validation.jurnal.integer",
            "required" => "T35JurnalBackupds.validation.jurnal.required",
        ],
        "kredit" => [
            "decimal" => "T35JurnalBackupds.validation.kredit.decimal",
            "required" => "T35JurnalBackupds.validation.kredit.required",
        ],
    ];
}
