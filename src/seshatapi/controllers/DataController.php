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
                $etiquettes = $this->db->query('SELECT "META_INSTANCE_NAME", "INTRODUCTION_GROUP_PROJECT_NAME", "DATE_GROUP_DATE" FROM "' . $table . '"');
                if($etiquettes) {
                    $etiquettes = $etiquettes->fetchAll();
                    foreach ($etiquettes as $etiquette) {
                        $res[] = array('label' => $etiquette["META_INSTANCE_NAME"],
                                        'project' => $etiquette["INTRODUCTION_GROUP_PROJECT_NAME"],
                                        'date' => $etiquette["DATE_GROUP_DATE"]
                                );
                    }
                }
            }
        }
        echo json_encode($res);
    }
}