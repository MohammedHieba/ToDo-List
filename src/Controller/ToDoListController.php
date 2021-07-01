<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    #[Route('/', name: 'to_do_list')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(): Response
    {
      //
    }

    #[Route('/update/{id}', name: 'update_task')]
    public function update(): Response
    {
        //
    }

    #[Route('/delete/{id}', name: 'delete_task')]
    public function delete(): Response
    {
        //
    }
}
