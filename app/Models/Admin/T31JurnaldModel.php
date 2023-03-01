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

    const SORTABLE = [
        1 => "t1.akun",
        2 => "t1.debet",
        3 => "t1.kredit",
        4 => "t2.nama",
    ];

    protected $allowedFields = ["akun", "debet", "kredit"];
    protected $returnType = "App\Entities\Admin\T31Jurnald";

    public static $labelField = "jurnal";

    protected $validationRules = [
        "debet" => [
            "label" => "T31Jurnalds.debet",
            "rules" => "required|decimal",
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
        "kredit" => [
            "decimal" => "T31Jurnalds.validation.kredit.decimal",
            "required" => "T31Jurnalds.validation.kredit.required",
        ],
    ];

    public function findAllWithT01Akun(
        string $selcols = "akun, t1.debet, t1.kredit",
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

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = "")
    {
        $builder = $this->db
            ->table($this->table . " t1")
            ->select("t1.debet AS debet, t1.kredit AS kredit, t2.nama AS akun");
        $builder->join("t01_akun t2", "t1.akun = t2.id", "left");

        return empty($search)
            ? $builder
            : $builder
                ->groupStart()
                ->like("t1.debet", $search)
                ->orLike("t1.kredit", $search)
                ->orLike("t2.id", $search)
                ->orLike("t1.akun", $search)
                ->orLike("t1.debet", $search)
                ->orLike("t1.kredit", $search)
                ->orLike("t2.nama", $search)
                ->groupEnd();
    }
}
