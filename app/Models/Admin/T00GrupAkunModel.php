<?php
namespace App\Models\Admin;

class T00GrupAkunModel extends \App\Models\GoBaseModel
{
    protected $table = "t00_grup_akun";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    const SORTABLE = [
        1 => "t1.id",
        2 => "t1.kode",
        3 => "t1.nama",
    ];

    protected $allowedFields = ["kode", "nama"];
    protected $returnType = "App\Entities\Admin\T00GrupAkun";

    public static $labelField = "nama";

    protected $validationRules = [
        "kode" => [
            "label" => "T00GrupAkuns.kode",
            "rules" => "trim|required|max_length[2]",
        ],
        "nama" => [
            "label" => "T00GrupAkuns.nama",
            "rules" => "trim|required|max_length[50]",
        ],
    ];

    protected $validationMessages = [
        "kode" => [
            "max_length" => "T00GrupAkuns.validation.kode.max_length",
            "required" => "T00GrupAkuns.validation.kode.required",
        ],
        "nama" => [
            "max_length" => "T00GrupAkuns.validation.nama.max_length",
            "required" => "T00GrupAkuns.validation.nama.required",
        ],
    ];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = "")
    {
        $builder = $this->db->table($this->table . " t1")->select("t1.id AS id, t1.kode AS kode, t1.nama AS nama");

        return empty($search)
            ? $builder
            : $builder
                ->groupStart()
                ->like("t1.id", $search)
                ->orLike("t1.kode", $search)
                ->orLike("t1.nama", $search)
                ->orLike("t1.id", $search)
                ->orLike("t1.kode", $search)
                ->orLike("t1.nama", $search)
                ->groupEnd();
    }
}
