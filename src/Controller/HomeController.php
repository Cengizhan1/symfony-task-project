<?php
namespace App\Controller;

use App\Entity\Developer;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $developers = $entityManager->getRepository(Developer::class);
        return $this->render("index.html.twig", [
            'developers'=>$developers->findAll(),
        ]);
    }

}
