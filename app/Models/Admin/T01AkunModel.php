<?php
namespace App\Models\Admin;

class T01AkunModel extends \App\Models\GoBaseModel
{
    protected $table = "t01_akun";

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
    protected $returnType = "App\Entities\Admin\T01Akun";

    public static $labelField = "nama";

    protected $validationRules = [
        "bulan_tahun" => [
            "label" => "T01Akuns.bulanTahun",
            "rules" => "trim|required|max_length[4]",
        ],
        "debet_ini" => [
            "label" => "T01Akuns.debetIni",
            "rules" => "required|decimal",
        ],
        "debet_lalu" => [
            "label" => "T01Akuns.debetLalu",
            "rules" => "required|decimal",
        ],
        "kode" => [
            "label" => "T01Akuns.kode",
            "rules" => "trim|required|max_length[4]",
        ],
        "kredit_ini" => [
            "label" => "T01Akuns.kreditIni",
            "rules" => "required|decimal",
        ],
        "kredit_lalu" => [
            "label" => "T01Akuns.kreditLalu",
            "rules" => "required|decimal",
        ],
        "nama" => [
            "label" => "T01Akuns.nama",
            "rules" => "trim|required|max_length[50]",
        ],
    ];

    protected $validationMessages = [
        "bulan_tahun" => [
            "max_length" => "T01Akuns.validation.bulan_tahun.max_length",
            "required" => "T01Akuns.validation.bulan_tahun.required",
        ],
        "debet_ini" => [
            "decimal" => "T01Akuns.validation.debet_ini.decimal",
            "required" => "T01Akuns.validation.debet_ini.required",
        ],
        "debet_lalu" => [
            "decimal" => "T01Akuns.validation.debet_lalu.decimal",
            "required" => "T01Akuns.validation.debet_lalu.required",
        ],
        "kode" => [
            "max_length" => "T01Akuns.validation.kode.max_length",
            "required" => "T01Akuns.validation.kode.required",
        ],
        "kredit_ini" => [
            "decimal" => "T01Akuns.validation.kredit_ini.decimal",
            "required" => "T01Akuns.validation.kredit_ini.required",
        ],
        "kredit_lalu" => [
            "decimal" => "T01Akuns.validation.kredit_lalu.decimal",
            "required" => "T01Akuns.validation.kredit_lalu.required",
        ],
        "nama" => [
            "max_length" => "T01Akuns.validation.nama.max_length",
            "required" => "T01Akuns.validation.nama.required",
        ],
    ];

    public function findAllWithT00GrupAkun(string $selcols = "*", int $limit = null, int $offset = 0)
    {
        $sql =
            "SELECT t1." .
            $selcols .
            ",  t2.nama AS grup_akun FROM " .
            $this->table .
            " t1  LEFT JOIN t00_grup_akun t2 ON t1.grup_akun = t2.id";
        if (!is_null($limit) && intval($limit) > 0) {
            $sql .= " LIMIT " . $limit;
        }

        if (!is_null($offset) && intval($offset) > 0) {
            $sql .= " OFFSET " . $offset;
        }

        $query = $this->db->query($sql);
        $result = $query->getResultObject();
        return $result;
    }
}
