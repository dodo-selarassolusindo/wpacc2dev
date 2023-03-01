<?php
namespace App\Models;

class UserModel extends \Myth\Auth\Models\UserModel
{
    protected $table = "users";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    const SORTABLE = [
        1 => "t1.id",
        2 => "t1.uuid",
        3 => "t1.email",
        4 => "t1.username",
        5 => "t1.first_name",
        6 => "t1.last_name",
        7 => "t1.primary_phone",
        8 => "t1.picture",
        9 => "t1.reset_at",
        10 => "t1.reset_expires",
        11 => "t1.status",
        12 => "t1.status_message",
        13 => "t1.active",
        14 => "t1.force_pass_reset",
        15 => "t1.created_at",
        16 => "t1.updated_at",
    ];

    protected $allowedFields = [
        "uuid",
        "email",
        "username",
        "first_name",
        "last_name",
        "primary_phone",
        "picture",
        "password_hash",
        "reset_expires",
        "status",
        "status_message",
        "active",
        "force_pass_reset",
        "reset_hash",
        "reset_at",
        "activate_hash",
        "permissions",
        "deleted_at",
    ];
    protected $returnType = "App\Entities\User";

    public static $labelField = "username";

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
            ->select(
                "t1.id AS id, t1.uuid AS uuid, t1.email AS email, t1.username AS username, t1.first_name AS first_name, t1.last_name AS last_name, t1.primary_phone AS primary_phone, t1.picture AS picture, t1.reset_at AS reset_at, t1.reset_expires AS reset_expires, t1.status AS status, t1.status_message AS status_message, t1.active AS active, t1.force_pass_reset AS force_pass_reset, t1.created_at AS created_at, t1.updated_at AS updated_at"
            );

        return empty($search)
            ? $builder
            : $builder
                ->groupStart()
                ->like("t1.id", $search)
                ->orLike("t1.uuid", $search)
                ->orLike("t1.email", $search)
                ->orLike("t1.username", $search)
                ->orLike("t1.first_name", $search)
                ->orLike("t1.last_name", $search)
                ->orLike("t1.primary_phone", $search)
                ->orLike("t1.picture", $search)
                ->orLike("t1.reset_at", $search)
                ->orLike("t1.reset_expires", $search)
                ->orLike("t1.status", $search)
                ->orLike("t1.status_message", $search)
                ->orLike("t1.created_at", $search)
                ->orLike("t1.updated_at", $search)
                ->orLike("t1.id", $search)
                ->orLike("t1.uuid", $search)
                ->orLike("t1.email", $search)
                ->orLike("t1.username", $search)
                ->orLike("t1.first_name", $search)
                ->orLike("t1.last_name", $search)
                ->orLike("t1.primary_phone", $search)
                ->orLike("t1.picture", $search)
                ->orLike("t1.reset_at", $search)
                ->orLike("t1.reset_expires", $search)
                ->orLike("t1.status", $search)
                ->orLike("t1.status_message", $search)
                ->orLike("t1.created_at", $search)
                ->orLike("t1.updated_at", $search)
                ->groupEnd();
    }
    /**
     * Returns the number of rows in the database table
     *
     * @return int
     */
    public function getCount()
    {
        $name = $this->table;
        $count = $this->db->table($name)->countAll();
        return $count;
    }

    /**
     * @param string $columns2select
     * @param string $resultSorting
     * @param bool $onlyActiveOnes
     * @param bool $alsoDeletedOnes
     * @param array $additionalConditions
     * @return array
     */
    public function getAllForMenu(
        $columns2select = "*",
        $resultSorting = "id",
        bool $onlyActiveOnes = false,
        bool $alsoDeletedOnes = true,
        $additionalConditions = []
    ) {
        $theseConditionsAreMet = [];

        if ($onlyActiveOnes) {
            if (in_array("enabled", $this->allowedFields)) {
                $theseConditionsAreMet["enabled"] = true;
            } elseif (in_array("active", $this->allowedFields)) {
                $theseConditionsAreMet["active"] = true;
            }
        }

        // This check is deprecated and left here only for backward compatibility and this method should be overridden in extending classes so as to check if the bound entity class has these attributes
        if (!$alsoDeletedOnes) {
            if (in_array("deleted_at", $this->allowedFields)) {
                $theseConditionsAreMet["deleted_at"] = null;
            }
            if (in_array("deleted", $this->allowedFields)) {
                $theseConditionsAreMet["deleted"] = false;
            }
            if (in_array("date_time_deleted", $this->allowedFields)) {
                $theseConditionsAreMet["date_time_deleted"] = null;
            }
        }

        if (!empty($additionalConditions)) {
            $theseConditionsAreMet = array_merge($theseConditionsAreMet, $additionalConditions);
        }
        $queryBuilder = $this->db->table($this->table);
        $queryBuilder->select($columns2select);
        if (!empty($theseConditionsAreMet)) {
            $queryBuilder->where($theseConditionsAreMet);
        }
        $queryBuilder->orderBy($resultSorting);
        $result = $queryBuilder->get()->getResult();

        return $result;
    }

    /**
     *
     * @param mixed $columns2select either array or string
     * @param mixed $sortResultsBy  either string or array
     * @param bool $onlyActiveOnes
     * @param string $select1str e.g. 'Please select one...'
     * @param bool $alsoDeletedOnes
     * @param array $additionalConditions
     * @return array for use in dropdown menus
     */
    public function getAllForCiMenu(
        $columns2select = ["id", "designation"],
        $sortResultsBy = "id",
        bool $onlyActiveOnes = false,
        $selectionRequestLabel = "Please select one...",
        bool $alsoDeletedOnes = true,
        $additionalConditions = []
    ) {
        $ciDropDownOptions = [];

        if (is_array($columns2select) && count($columns2select) >= 2) {
            $key = $columns2select[0];
            $val = $columns2select[1];

            $cols2selectStr = implode(",", $columns2select);

            $valInd = strpos($val, " AS ");
            if ($valInd !== false) {
                $val = substr($val, $valInd + 4);
            }
        } elseif (is_string($columns2select) && strpos($columns2select, ",") !== false) {
            $cols2selectStr = $columns2select;

            $arr = explode(",", $columns2select, 2);
            $key = trim($arr[0]);
            $val = trim($arr[1]);
        } else {
            return ["error" => "Invalid argument for columns/fields to select"];
        }

        $resultList = $this->getAllForMenu(
            $cols2selectStr,
            $sortResultsBy,
            $onlyActiveOnes,
            $alsoDeletedOnes,
            $additionalConditions
        );

        if ($resultList != false) {
            if (!empty($selectionRequestLabel)) {
                $ciDropDownOptions[""] = $selectionRequestLabel;
            }

            foreach ($resultList as $res) {
                if (isset($res->$key) && isset($res->$val)) {
                    $ciDropDownOptions[$res->$key] = $res->$val;
                }
            }
        }

        return $ciDropDownOptions;
    }

    /**
     * @param array|string[] $columns2select
     * @param null $resultSorting
     * @param bool|bool $onlyActiveOnes
     * @param null $searchStr
     * @return array
     */
    public function getSelect2MenuItems(
        array $columns2select = ["id", "designation"],
        $resultSorting = null,
        bool $onlyActiveOnes = true,
        $searchStr = null
    ) {
        $theseConditionsAreMet = [];

        $id = $columns2select[0] . " AS id";
        $text = $columns2select[1] . " AS text";

        if (empty($resultSorting)) {
            $resultSorting = $this->getPrimaryKeyName();
        }

        if ($onlyActiveOnes) {
            if (in_array("enabled", $this->allowedFields)) {
                $theseConditionsAreMet["enabled"] = true;
            } elseif (in_array("active", $this->allowedFields)) {
                $theseConditionsAreMet["active"] = true;
            }
        }

        $queryBuilder = $this->db->table($this->table);
        $queryBuilder->select([$id, $text]);
        $queryBuilder->where($theseConditionsAreMet);
        if (!empty($searchStr)) {
            $queryBuilder
                ->groupStart()
                ->like($columns2select[0], $searchStr)
                ->orLike($columns2select[1], $searchStr)
                ->groupEnd();
        }
        $queryBuilder->orderBy($resultSorting);
        $result = $queryBuilder->get()->getResult();

        return $result;
    }
}
