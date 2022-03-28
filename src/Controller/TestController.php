<?php

namespace App\Controller;

use App\Entity\TestTemplate;
use App\Entity\Test;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/admin/test', name: 'test')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $tests = $doctrine->getRepository(Test::class)->findByOwner($this->getUser());
        $templates = $doctrine->getRepository(TestTemplate::class)->findAll();
        return $this->render('test/index.html.twig', [
            'tests' => $tests,
            'templates' => $templates
        ]);
    }
}
