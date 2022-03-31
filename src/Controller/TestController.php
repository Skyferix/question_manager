<?php

namespace App\Controller;

use App\Entity\TestTemplate;
use App\Entity\Test;
use App\Entity\User;
use App\Repository\TestRepository;
use App\Repository\TestTemplateRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/admin/test', name: 'test')]
    public function index(TestTemplateRepository $test_template_repository, TestRepository $test_repository): Response
    {
        $user = $this->getUser();
        $tests = $test_repository->findBy(['owner' => $user]);
        $templates = $test_template_repository->findAll();
        return $this->render('test/index.html.twig', [
            'tests' => $tests,
            'templates' => $templates
        ]);
    }
}
