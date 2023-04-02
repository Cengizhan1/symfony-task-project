<?php
namespace App\Controller;

use App\Entity\Task;
use App\Service\AssignTasks;
use App\Service\Provider1Adapter;
use App\Service\Provider2Adapter;
use App\Service\TaskGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TaskController extends AbstractController
{

    /**
     * @Route("/saveTasks",name="saveTask")
     */
    public function saveTask(EntityManagerInterface $entityManager): Void
    {
//        $provider1Generator = new Provider1Adapter('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa');
//        $provider1Generator->adapter();
//        $provider2Generator = new Provider2Adapter('http://www.mocky.io/v2/5d47f235330000623fa3ebf7');
//        $provider2Generator->adapter();
//        $assignTasks = new AssignTasks();
//        $assignTasks->assignTasks();

    }

    /**
     * @Route("/tasks",name="tasks")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $tasks = $entityManager->getRepository(Task::class);
        return $this->render("task/index.html.twig", [
            'tasks'=>$tasks->findAll(),
            'assignedTasks'=>$tasks->findAll(),
        ]);
    }
}
