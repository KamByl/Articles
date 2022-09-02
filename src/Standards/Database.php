<?php

namespace App\Standards;

use Exception;
use PDO;

class Database extends PDO
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $dns = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;
            parent::__construct($dns, DB_USER, DB_PASS);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    /**
     * allRecords
     * Return all elements from database 
     *
     * @param  mixed $className - name of class to use
     * @param  mixed $where - array with search params
     * @return array
     */
    public function allRecords(string $className, array $where = array()): array
    {
        $where_sql = '';
        $where_data = array();
        $table = $className::getTableName();
        if ($where) {
            foreach ($where as $key => $value) {
                $where_param[] = '`' . $key . '` LIKE ?';
                $where_data[] = $value;
            }
            $where_sql = 'WHERE ' . implode(' AND ', $where_param);
        }
        $query = 'SELECT * FROM ' . $table . ' ' . $where_sql . ' LIMIT 0,1000';
        $db = $this->prepare($query);
        try {
            $db->execute($where_data);
            $results = $db->fetchAll(PDO::FETCH_CLASS, $className);
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
        return $results;
    }
    
    /**
     * oneRecord
     *
     * @param  mixed $object
     * @param  mixed $id
     * @return void
     */
    public function oneRecord(ModelAbstract $object, int $id)
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $table = $object->getTableName();
        $data = array(
            'id' => $id
        );

        $query = 'SELECT * FROM `' . $table . '` WHERE id=:id LIMIT 0,1';
        $db = $this->prepare($query);
        try {
            $db->execute($data);
            $db->setFetchMode(PDO::FETCH_INTO, $object);
            $db->fetch();
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
    }
    
    /**
     * delete
     *
     * @param  mixed $object
     * @return void
     */
    public function delete(ModelAbstract $object)
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $table = $object->getTableName();
        $data = array(
            'id' => $object->id
        );

        $query = 'DELETE FROM `' . $table . '` WHERE id=:id';
        $db = $this->prepare($query);
        try {
            $db->execute($data);
            $results = $db->fetch();
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
    }
    
    /**
     * create
     *
     * @param  mixed $object
     * @return void
     */
    public function create(ModelAbstract $object)
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $table = $object->getTableName();
        foreach ($object->fields as $field) {
            $sql_param[] = '`' . $field . '` = :' . $field;
            $data_param[':' . $field] = $object->$field;
        }

        $query = 'INSERT INTO `' . $table . '` SET ' . implode(',', $sql_param);

        $db = $this->prepare($query);
        try {
            $db->execute($data_param);
            $object->setID($this->lastInsertId('id'));
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
    }
    
    /**
     * update
     *
     * @param  mixed $object
     * @return void
     */
    public function update(ModelAbstract $object)
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $table = $object->getTableName();
        foreach ($object->fields as $field) {
            $sql_param[] = '`' . $field . '` = :' . $field;
            $data_param[':' . $field] = $object->$field;
        }
        $data_param[':id'] = $object->id;
        $query = 'UPDATE `' . $table . '` SET ' . implode(',', $sql_param) . ' WHERE id=:id';

        $db = $this->prepare($query);
        try {
            $db->execute($data_param);
        } catch (\PDOException $e) {
            //TO DO
            echo "error";
        }
    }
}
