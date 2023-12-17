<?php
namespace Atomine\core;

use mysqli;

class Database
{
    public $mysqli;
    public $joins = [];

    public function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', '', 'ukk_spp');
    }

    public function join($joins = [])
    {
        $this->joins[] = $joins;
        return $this;
    }

    public function one($id = null, $where = null)
    {
        $j = "SELECT * FROM ".$this->table_name;
        if (!empty($this->joins)) {
            foreach ($this->joins[0] as $join) {
                $j .= " INNER JOIN ".$join." ON ".$this->table_name.".id_".$join." = ".$join.".id_".$join;
            }
            $j .= " WHERE ".$where." = ".$id;
        } else {
            if ($where === null) {
                $j .= " WHERE ".$this->table_id." = ".$id;
            } else {
                $j .= " WHERE ".$where;
            }
        }

        $result = $this->mysqli->query($j);
        return $result->fetch_assoc();
    }

    public function all()
    {
        $j = '';
        if (!empty($this->joins)) {
            foreach ($this->joins[0] as $join) {
                $j .= "INNER JOIN ".$join." ON ".$this->table_name.".id_".$join."=".$join.".id_".$join." ";
            }

            $j = "SELECT * FROM ".$this->table_name." ".$j;
        } else {
            $j = "SELECT * FROM ".$this->table_name;
        }

        $result = $this->mysqli->query($j);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function update()
    {
        return "Hello";
    }
}