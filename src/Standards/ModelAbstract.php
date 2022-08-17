<?php
namespace App\Standards;

use ReflectionClass;

abstract class ModelAbstract implements ModelInterface
{
    public static $tableName = '';

    public function getTableName(): ?string
    {
        return (empty(static::$tableName)) ? (new ReflectionClass(static::class))->getShortName() : static::$tableName;
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}