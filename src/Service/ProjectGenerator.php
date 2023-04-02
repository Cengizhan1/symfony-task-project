<?php

namespace App\Service;

use App\Entity\Project;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class  ProjectGenerator
{
    /** @var EntityManagerInterface $entityManager */
    public EntityManagerInterface $entityManager;

    public function generate()
    {
        $project = new Project();
        $project->setName('Project '.$project->getId());
        $this->entityManager->persist($project);
        $this->entityManager->flush();
        return $project->getId();
    }
}