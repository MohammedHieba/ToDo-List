<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    #[Route('/', name: 'to_do_list')]
    public function index(): Response
    {
        $tasks=$this->getDoctrine()->getRepository(Task::class)->findAll();
        return $this->render('index.html.twig',[
            'tasks' => $tasks
        ]);
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $title = ($request->request->get('title'));
        if(!empty($title)){
            $entityManager = $this->getDoctrine()->getManager();
            $task =new Task();
            $task->setTitle($title);
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('to_do_list');
        }else{
            return $this->redirectToRoute('to_do_list');
        }


    }


    #[Route('/update/{id}', name: 'update_task' , methods: ["POST"])]
    public function update(Request $request , $id): Response
    {
        $title = $request->request->get('title');
        $task=$this->getDoctrine()->getRepository(Task::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $task->setTitle($title);
        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute('to_do_list');
    }

    #[Route('/delete/{id}', name: 'delete_task')]
    public function delete( Request $request, $id): Response
    {

        $task=$this->getDoctrine()->getRepository(Task::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($task);
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');

    }
}
