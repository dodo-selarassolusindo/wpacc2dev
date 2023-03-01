<?php
namespace App\Models\Admin;

class T33JurnalLamadModel extends \App\Models\GoBaseModel
{
    protected $table = "t33_jurnal_lamad";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["jurnal", "akun", "debet", "kredit"];
    protected $returnType = "App\Entities\Admin\T33JurnalLamad";

    public static $labelField = "jurnal";

    protected $validationRules = [
        "akun" => [
            "label" => "T33JurnalLamads.akun",
            "rules" => "required|integer",
        ],
        "debet" => [
            "label" => "T33JurnalLamads.debet",
            "rules" => "required|decimal",
        ],
        "jurnal" => [
            "label" => "T33JurnalLamads.jurnal",
            "rules" => "required|integer",
        ],
        "kredit" => [
            "label" => "T33JurnalLamads.kredit",
            "rules" => "required|decimal",
        ],
    ];

    protected $validationMessages = [
        "akun" => [
            "integer" => "T33JurnalLamads.validation.akun.integer",
            "required" => "T33JurnalLamads.validation.akun.required",
        ],
        "debet" => [
            "decimal" => "T33JurnalLamads.validation.debet.decimal",
            "required" => "T33JurnalLamads.validation.debet.required",
        ],
        "jurnal" => [
            "integer" => "T33JurnalLamads.validation.jurnal.integer",
            "required" => "T33JurnalLamads.validation.jurnal.required",
        ],
        "kredit" => [
            "decimal" => "T33JurnalLamads.validation.kredit.decimal",
            "required" => "T33JurnalLamads.validation.kredit.required",
        ],
    ];
}
