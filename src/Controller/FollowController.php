<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class FollowController extends AbstractController
{
    #[Route('/follow', name: 'app_follow')]
    public function index(): JsonResponse
    {
        return $this->render('follow/follow.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}
