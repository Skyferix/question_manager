<?php

namespace App\Controller;

use App\Entity\QuestionBank;
use App\Repository\QuestionBankRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin/question_bank', name: 'question_bank', methods: ['GET'])]
class QuestionBankController extends AbstractController
{
    #[Route('', name: '')]
    public function index(QuestionBankRepository $question_bank_repository): Response
    {
        $question_banks = $question_bank_repository->findAll();
        return $this->render('question_bank/index.html.twig', [
            'question_banks' => $question_banks,
        ]);
    }

    #[Route('/add', name: '_add', methods: ['POST'])]
    public function add(ManagerRegistry $doctrine, ValidatorInterface $validator, Request $request): Response
    {
        $title = $request->request->get('title');
        $description = $request->request->get('description');

        if(!$title) return new Response('Title not provided', 400);
        if(!$description) return new Response('Description not provided', 400);

        $entity_manager = $doctrine->getManager();
        $question_bank = new QuestionBank($title, $description);
        $errors = $validator->validate($question_bank);
        if(count($errors) > 0){
            return new Response(json_encode([
                'message' => 'Title already used in other bank',
                'advanced_message' => (string) $errors
            ]), 422);
        }
        try{
            $entity_manager->persist($question_bank);
            $entity_manager->flush();
        } catch (\Exception $e){
            return new Response(json_encode([
                'message' => 'Sorry mistake on our behave try later',
                'advanced_message' => $e
            ]), 500);
        }
        return new Response('Question bank created successfully');
    }

    #[Route('/view/{id}', name: '_view', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function view(int $id, QuestionBankRepository $question_bank_repository): Response
    {
        $question_bank = $question_bank_repository->find($id);
        return $this->render('question_bank/index.html.twig', [
            'question_bank' => $question_bank,
        ]);
    }
}
