<?php

namespace Clubdeuce\Repositories;

use ClubdeuceTheatreCMS\Models\Season;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

readonly class SeasonRepository
{
    public function __construct(private EntityManager $em)
    {
    }

    /**
     * @throws ORMException
     */
    public function create(Season $season): Season
    {
        $this->em->persist($season);
        $this->em->flush();
        return $season;
    }

    public function findById(int $id): ?Season
    {
        try {
            return $this->em->find('ClubdeuceTheatreCMS\Models\Season', $id);
        } catch (OptimisticLockException|ORMException $e) {
            return null;
        }
    }
}
