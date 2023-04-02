<?php

namespace App\Service;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class  TaskGenerator{

    /** @var EntityManagerInterface $entityManager */
    public EntityManagerInterface $entityManager;

    public int $taskLevel;
    public string $taskName;
    public int $taskTime;
    public int $projectId;

    public function __construct($taskName,$taskLevel,$taskTime,$projectId)
    {
        $this->taskName = $taskName;
        $this->taskTime =(int) $taskTime;
        $this->taskLevel =(int) $taskLevel;
        $this->projectId =(int) $projectId;
    }

    public function saveTask()
    {
        $task = new Task();
        $task->setName($this->taskName)->setLevel($this->taskLevel)
            ->setTime($this->taskTime)->setState(0)->setProjectId($this->projectId);
        $this->entityManager->persist($task);
        $this->entityManager->flush();
    }
}