<?php
namespace App\Controller;

use App\Entity\Developer;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DeveloperController extends AbstractController
{
    /**
     * @Route("/developer/create",name="developerCreate")
     */
    public function store(EntityManagerInterface $entityManager ,Request $request)
    {
        if ($request->get('name'))
        {
            $developer = new Developer();
            $developer->setName($request->get('name'))->setLevel($request->get('level'));
            $entityManager->persist($developer);
            $entityManager->flush();
        }
        return $this->redirect("/", );
    }
}
