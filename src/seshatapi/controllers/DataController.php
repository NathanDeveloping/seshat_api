<?php

namespace seshatapi\controllers;
use seshatapi\connexion\DatabaseConnexion;

class DataController
{

    private $db;

    public function __construct() {
        $this->db = DatabaseConnexion::getInstance()->getDB();
    }

    public function getTables() {
        if(!isset($this->db)) {
            return;
        }
        $tables = $this->db->query('SELECT table_name FROM information_schema.tables WHERE table_schema=\'public\' AND table_name LIKE \'%_CORE\'')->fetchAll();
        $res = array();
        foreach($tables as $tableCur) {
            $res[] = $tableCur["table_name"];
        }
        return $res;
    }

    public function getLabels() {
        $res = array();
        $tables = $this->getTables();
        if(isset($tables)) {
            foreach($tables as $table) {
                $etiquettes = $this->db->query('SELECT "META_INSTANCE_NAME" FROM "' . $table . '"');
                if($etiquettes) {
                    $etiquettes = $etiquettes->fetchAll();
                    foreach ($etiquettes as $etiquette) {
                        $res[] = $etiquette["META_INSTANCE_NAME"];
                    }
                }
            }
        }
        echo json_encode($res);
    }
}