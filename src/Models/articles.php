<?php
namespace App\Models;

use App\Standards\Database;
use App\Standards\ModelAbstract;

class Articles extends ModelAbstract
{
    private $title;
    private $text;

    static public $fields = array(
        'id' => 'integer',
        'title' => 'string',
        'text' => 'text'
    );

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text=$text;

        return $this;
    }

    public function read(): ?self
    {
        $db = new Database;
        return $this;
    }

    public function delete(): ?self
    {
        return $this;
    }

    public function create(): ?self
    {
        return $this;
    }

    public function update(): ?self
    {
        return $this;
    }
}