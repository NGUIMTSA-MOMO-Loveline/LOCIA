<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class CommentController extends AbstractController
{
    #[Route('/comment', name: 'app_comment')]
    public function index(): JsonResponse
    {
        return $this->render('comment/comment.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}
