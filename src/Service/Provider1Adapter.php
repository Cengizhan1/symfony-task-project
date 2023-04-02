<?php

namespace App\Service;

use App\Entity\Project;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class  Provider1Adapter
{
    public string $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function adapter()
    {
        $tasks = file_get_contents($this->api);
        $tdecodeTasks = json_decode($tasks, true);
        $projectGenerator = new ProjectGenerator();
        $projectId = $projectGenerator->generate();
        foreach ($tdecodeTasks as $decodeTask) {
            $taskGenerator = new TaskGenerator($decodeTask['id'], $decodeTask['zorluk'], $decodeTask['sure'],$projectId);
            $taskGenerator->saveTask();
        }
    }
}