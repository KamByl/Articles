<?php

namespace App\Standards;

use ReflectionClass;
use App\Standards\Database;

abstract class ModelAbstract implements ModelInterface
{
    public static $tableName = '';
    
    /**
     * getClassName
     *
     * @return string
     */
    public function getClassName(): ?string
    {
        return static::class;
    }
    
    /**
     * getTableName
     *
     * @return string
     */
    public function getTableName(): ?string
    {
        return (empty(static::$tableName)) ? (new ReflectionClass(static::class))->getShortName() : static::$tableName;
    }
    
    /**
     * getId
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * setId
     *
     * @param  mixed $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * unsetId
     *
     * @return self
     */
    public function unsetId(): self
    {
        $this->id = '';
        return $this;
    }
    
    /**
     * read
     *
     * @param  mixed $id
     * @return self
     */
    public function read(int $id): ?self
    {
        $db = new Database();
        $db->oneRecord($this, $id);
        return $this;
    }
    
    /**
     * delete
     *
     * @return self
     */
    public function delete(): ?self
    {
        $db = new Database();
        if ($this->id) {
            $db->delete($this);
            $this->id = '';
        }
        return $this;
    }
    
    /**
     * update
     *
     * @return self
     */
    public function update(): ?self
    {
        $db = new Database();
        if ($this->id) {
            $db->update($this);
        }
        return $this;
    }
    
    /**
     * create
     *
     * @return self
     */
    public function create(): ?self
    {
        $db = new Database();
        $db->create($this);
        return $this;
    }
}
