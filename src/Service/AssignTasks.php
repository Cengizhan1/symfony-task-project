<?php

namespace App\Service;

use App\Entity\Developer;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class  AssignTasks
{
    /** @var EntityManagerInterface $entityManager */
    public EntityManagerInterface $entityManager;

    public function assignTasks(): void
    {
        $array = [5,4,3,2,1];
        foreach ($array as $item) {
            $tasks = $this->getTaskByLevel($item);
            $this->assignTaskToDeveloper($item,$tasks);
        }
    }
    public function assignTaskToDeveloper($level,$tasks): void
    {
       $developer = $this->getDeveloperByLevel($level);
        foreach ($tasks as $task){
            $task->setDeveloperId($developer[0]);
            $this->entityManager->persist($task);
        }
        $this->entityManager->flush();
    }
    public function getTaskByLevel($level)
    {
        $taskRepository = $this->entityManager->getRepository(Task::class);
        return $taskRepository->findBy([
            'state' => 0,
            'level' => $level,
        ]);
    }
    public function getDeveloperByLevel($level)
    {
        $developerRepository = $this->entityManager->getRepository(Developer::class);
        return $developerRepository->findBy([
            'level' => $level,
        ]);
    }
}