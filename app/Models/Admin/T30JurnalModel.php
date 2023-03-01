<?php
namespace App\Models\Admin;

class T30JurnalModel extends \App\Models\GoBaseModel
{
    protected $table = "t30_jurnal";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    const SORTABLE = [
        1 => "t1.nomor",
        2 => "t1.tanggal",
        3 => "t1.keterangan",
    ];

    protected $allowedFields = ["nomor", "tanggal", "keterangan"];
    protected $returnType = "App\Entities\Admin\T30Jurnal";

    public static $labelField = "nomor";

    protected $validationRules = [
        "keterangan" => [
            "label" => "T30Jurnals.keterangan",
            "rules" => "trim|required|max_length[16313]",
        ],
        "nomor" => [
            "label" => "T30Jurnals.nomor",
            "rules" => "trim|required|max_length[8]",
        ],
        "tanggal" => [
            "label" => "T30Jurnals.tanggal",
            "rules" => "required|valid_date",
        ],
    ];

    protected $validationMessages = [
        "keterangan" => [
            "max_length" => "T30Jurnals.validation.keterangan.max_length",
            "required" => "T30Jurnals.validation.keterangan.required",
        ],
        "nomor" => [
            "max_length" => "T30Jurnals.validation.nomor.max_length",
            "required" => "T30Jurnals.validation.nomor.required",
        ],
        "tanggal" => [
            "required" => "T30Jurnals.validation.tanggal.required",
            "valid_date" => "T30Jurnals.validation.tanggal.valid_date",
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
        $builder = $this->db
            ->table($this->table . " t1")
            ->select("t1.nomor AS nomor, t1.tanggal AS tanggal, t1.keterangan AS keterangan");

        return empty($search)
            ? $builder
            : $builder
                ->groupStart()
                ->like("t1.nomor", $search)
                ->orLike("t1.tanggal", $search)
                ->orLike("t1.keterangan", $search)
                ->orLike("t1.nomor", $search)
                ->orLike("t1.tanggal", $search)
                ->orLike("t1.keterangan", $search)
                ->groupEnd();
    }
}
