<?php

namespace App\Service;

use App\Entity\Project;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\AST\Functions\AvgFunction;

class  ProjectGenerator
{
    /** @var EntityManagerInterface $entityManager */
    public EntityManagerInterface $entityManager;

    public function getProjectId()
    {
        $project = new Project();
        $project->setName('Project '.$project->getId());
        $this->entityManager->persist($project);
        $this->entityManager->flush();
        return $project->getId();
    }
    public function saveTimeToProject($projectId,$totalTime): void
    {
       $project = $this->entityManager->getRepository(Project::class)->find($projectId);
       $project->setTotalTime($totalTime);
       $this->entityManager->persist($project);
       $this->entityManager->flush();
    }
    public function calculateTime($projectId): int
    {
        $query = $this->entityManager->createQuery(
            'SELECT SUM(p.time) * SUM(p.level) / count(p.name)
            FROM App\Entity\Task p
            WHERE p.project_id = :project_id'
        )->setParameter('project_id',$projectId);
        $totalTimeArr = $query->getResult()[0];
        $totalTime =  $totalTimeArr[1];
        return (int) $totalTime/10;
    }

//    public function saveTimeToProject(EntityManagerInterface $entityManager): void
//    {
//        $projects = $entityManager->getRepository(Project::class)->findAll();
//        foreach ($projects as $project) {
//
//        }
//    }
}