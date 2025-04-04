<?php
namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class PostController extends AbstractController
{
    #[Route('/post/new', name: 'app_post_new', methods: ['GET'])]
public function newForm(Request $request): Response
{
    // Créer une nouvelle instance de Post
    $post = new Post();
    
    // Créer le formulaire pour ce Post
    $form = $this->createForm(PostType::class, $post);

    // Afficher le formulaire
    return $this->render('post/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

    #[Route('/post/new', name: 'app_post_new_submit', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        // Créer une nouvelle instance de Post
        $post = new Post();
        
        // Créer et gérer le formulaire pour ce Post
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
    
        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();
    
            // Rediriger vers la page de détail du post
            return $this->redirectToRoute('app_post_show', ['id' => $post->getId()]);
        }
    
        // Si le formulaire est invalide, retourner avec les erreurs
        return $this->render('post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    

    #[Route('/post/{id}', name: 'app_post_show')]
public function show(int $id, EntityManagerInterface $em): Response
{
    // Trouver le post par son ID
    $post = $em->getRepository(Post::class)->find($id);

    // Si le post n'existe pas
    if (!$post) {
        throw $this->createNotFoundException('Le post demandé n\'existe pas.');
    }

    // Retourner la vue avec le post
    return $this->render('post/show.html.twig', [
        'post' => $post,
    ]);
}


#[Route('/post/{id}/edit', name: 'app_post_edit', methods: ['GET'])]
public function editForm(int $id, EntityManagerInterface $em): Response
{
    // Trouver le post par son ID
    $post = $em->getRepository(Post::class)->find($id);

    // Si le post n'existe pas
    if (!$post) {
        throw $this->createNotFoundException('Le post demandé n\'existe pas.');
    }

    // Créer le formulaire pour le post
    $form = $this->createForm(PostType::class, $post);

    // Afficher le formulaire
    return $this->render('post/edit.html.twig', [
        'form' => $form->createView(),
        'post' => $post,
    ]);
}

#[Route('/post/{id}/edit', name: 'app_post_edit_submit', methods: ['POST'])]
public function edit(int $id, Request $request, EntityManagerInterface $em): Response
{
    // Trouver le post par son ID
    $post = $em->getRepository(Post::class)->find($id);

    // Si le post n'existe pas
    if (!$post) {
        throw $this->createNotFoundException('Le post demandé n\'existe pas.');
    }

    // Créer et gérer le formulaire pour le post
    $form = $this->createForm(PostType::class, $post);
    $form->handleRequest($request);

    // Si le formulaire est soumis et valide
    if ($form->isSubmitted() && $form->isValid()) {
        $em->flush();  // Mettre à jour le post

        // Rediriger vers la page de détail du post après la mise à jour
        return $this->redirectToRoute('app_post_show', ['id' => $post->getId()]);
    }

    // Si le formulaire est invalide, retourner avec les erreurs
    return $this->render('post/edit.html.twig', [
        'form' => $form->createView(),
        'post' => $post,
    ]);
}

}
