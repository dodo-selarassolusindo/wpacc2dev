<?php
namespace App\Models\Admin;

class T31JurnaldModel extends \App\Models\GoBaseModel
{
    protected $table = "t31_jurnald";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $allowedFields = ["jurnal", "akun", "debet", "kredit"];
    protected $returnType = "App\Entities\Admin\T31Jurnald";

    public static $labelField = "jurnal";

    protected $validationRules = [
        "debet" => [
            "label" => "T31Jurnalds.debet",
            "rules" => "required|decimal",
        ],
        "jurnal" => [
            "label" => "T31Jurnalds.jurnal",
            "rules" => "required|integer",
        ],
        "kredit" => [
            "label" => "T31Jurnalds.kredit",
            "rules" => "required|decimal",
        ],
    ];

    protected $validationMessages = [
        "debet" => [
            "decimal" => "T31Jurnalds.validation.debet.decimal",
            "required" => "T31Jurnalds.validation.debet.required",
        ],
        "jurnal" => [
            "integer" => "T31Jurnalds.validation.jurnal.integer",
            "required" => "T31Jurnalds.validation.jurnal.required",
        ],
        "kredit" => [
            "decimal" => "T31Jurnalds.validation.kredit.decimal",
            "required" => "T31Jurnalds.validation.kredit.required",
        ],
    ];

    public function findAllWithT01Akun(
        string $selcols = "id, t1.jurnal, t1.akun, t1.debet, t1.kredit",
        int $limit = null,
        int $offset = 0
    ) {
        $sql =
            "SELECT t1." .
            $selcols .
            ",  t2.nama AS akun FROM " .
            $this->table .
            " t1  LEFT JOIN t01_akun t2 ON t1.akun = t2.id";
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
