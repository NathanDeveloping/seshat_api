<?php

namespace seshatapi\connexion;
/**
 * Created by PhpStorm.
 * User: otelo
 * Date: 23/05/17
 * Time: 14:36
 */
use Exception;
use PDO;
class DatabaseConnexion
{

    private static $instance;
    private $db;

    private function __construct()
    {
        $config = parse_ini_file("src/config/config.ini");
        if(!isset($config['host']) || !isset($config['port']) ||
            !isset($config['dbname']) || !isset($config['user']) || !isset($config['password'])) {
        } else {
            try {
                $this->db = new PDO(strtr("pgsql:host={host};port={port};dbname={dbname};user={user};password={password}", [
                    "{host}" => $config['host'],
                    "{port}" => $config['port'],
                    "{dbname}" => $config['dbname'],
                    "{user}" => $config['user'],
                    "{password}" => $config['password']
                ]));
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function getInstance() {
        if(!isset($instance)) {
            $instance = new DatabaseConnexion();
        }
        return $instance;
    }

    public function getDB() {
        return $this->db;
    }

}