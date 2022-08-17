<?php
namespace App\Standards;

interface ModelInterface
{
    public function read(): ?self;
    public function delete(): ?self;
    public function update(): ?self;
    public function create(): ?self;
}