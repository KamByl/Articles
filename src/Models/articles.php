<?php

namespace App\Models;

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

    /**
     * getTitle
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * setTitle
     *
     * @param  mixed $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * getText
     *
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * setText
     *
     * @param  mixed $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}