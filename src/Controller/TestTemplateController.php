<?php

namespace App\Controller;

use App\Entity\QuestionBank;
use App\Entity\TestTemplate;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/test_template', name: 'test_template')]
class TestTemplateController extends AbstractController
{
    #[Route('', name: '')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $test_templates = $doctrine->getRepository(TestTemplate::class)->findAll();
        $question_banks = $doctrine->getRepository(QuestionBank::class)->findAll();
        return $this->render('test_template/index.html.twig', [
            'test_templates' => $test_templates,
            'question_banks' => $question_banks,
        ]);
    }
}
