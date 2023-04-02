<?php

namespace App\Service;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class  Provider2Adapter{
    public string $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function adapter()
    {
        $tasks = file_get_contents($this->api);
        $tdecodeTasks = json_decode($tasks,true);
        $projectGenerator = new ProjectGenerator();
        $projectId = $projectGenerator->generate();
        foreach ($tdecodeTasks as $decodeTask) {
            $title = array_keys($decodeTask);
            $content = array_keys($decodeTask[$title[0]]);
            $taskGenerator = new TaskGenerator($title[0],$content[0],$content[1],$projectId);
            $taskGenerator->saveTask();
        }
    }
}