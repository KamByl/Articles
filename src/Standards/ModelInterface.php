<?php
namespace App\Standards;

interface ModelInterface
{
    public function read(int $id): ?self;
    public function delete(): ?self;
    public function update(): ?self;
    public function create(): ?self;
}