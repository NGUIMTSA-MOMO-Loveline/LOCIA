<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
<<<<<<< HEAD
    #[Route('/profile', name: 'post_like')]
    public function index(): JsonResponse
=======
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
>>>>>>> 44d4767d72e50ce63572a92b5bb323dcde3fc621
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('profile/index.html.twig', [
            'user' => $user
        ]);
    }
}
