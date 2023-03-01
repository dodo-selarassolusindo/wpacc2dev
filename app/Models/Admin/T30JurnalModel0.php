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

    function getNomorJurnal($tanggal)
    {
        if ($tanggal != null) {
            // echo pre(dateMysql($date)); exit;
        }

        $nextNomor = "";
        $lastNomor = "";

        $prefix = $tanggal != null ? 'J' . substr($tanggal, 2, 2) . substr($tanggal, 5, 2) : 'J' . date('ym'); // date('ym');
        $nextNomor = $prefix . "001";

        $q = "
            select
                nomor
            from
                ".$this->table."
            where
                left(nomor, 5) = '".$prefix."'
            order by
                nomor desc
            limit 1
        ";
        $row = $this->db->query($q)->getRow();

        if ($row) {
            $value = $row->nomor;
            if ($prefix == substr($value, 0, 5)) {
                /**
                 * masih pada bulan yang sama
                 */
                $lastNomor = intval(substr($value, 5, 3));
                $lastNomor = intval($lastNomor) + 1;
                $nextNomor = $prefix . sprintf('%03s', $lastNomor);
                if (strlen($nextNomor) > 8) {
                    $nextNomor = $prefix . "999";
                }
            }
        }
        return $nextNomor;
    }
}
