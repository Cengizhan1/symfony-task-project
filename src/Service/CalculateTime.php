<?php
//
//namespace App\Service;
//
//use App\Entity\Developer;
//use App\Entity\Project;
//use App\Entity\Task;
//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\Query\AST\Functions\AvgFunction;
//
//class  CalculateTime
//{
//
//    public function calculateProjects(EntityManagerInterface $entityManager): void
//    {
//        $projects = $entityManager->getRepository(Project::class)->findAll();
//        foreach ($projects as $project) {
//
//        }
//    }
//    public function calculateTime(EntityManagerInterface $entityManager): void
//    {
//        $projects = $entityManager->getRepository(Project::class)->createQueryBuilder('');
//        AvgFunction::class
//
//    }
//
//    public function saveTimeToProject(EntityManagerInterface $entityManager): void
//    {
//        $projects = $entityManager->getRepository(Project::class)->findAll();
//        foreach ($projects as $project) {
//
//        }
//    }
//
//}