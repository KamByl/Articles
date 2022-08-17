<?php

namespace App\Standards;

use Exception;
use PDO;

class Database extends PDO
{
    public function __construct()
    {
        try {
            $dns = "mysql:dbname=".DB_NAME.";host=".DB_HOST;
            parent::__construct($dns, DB_USER, DB_PASS);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    public function allRecords(string $className): array
    {
        $table = $className::getTableName();
        $query = 'SELECT * FROM Articles LIMIT 0,1000';
        $db = $this->prepare($query, array($table));
        try {
            $db->execute();
            $results = $db->fetchAll(PDO::FETCH_CLASS, $className);
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
        return $results;
    }
}