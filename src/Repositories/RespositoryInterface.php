<?php
namespace ClubdeuceTheatreCMS\Repositories;

interface RespositoryInterface
{
    /**
     * @return object[]
     */
    public function findAll(): array;
    public function findById(int $id): ?object;
}
