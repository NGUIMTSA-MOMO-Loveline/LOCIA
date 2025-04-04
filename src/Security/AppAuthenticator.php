<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\User\UserBadge;
use Symfony\Component\Security\Core\Credentials\PasswordCredentials;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppAuthenticator extends AbstractAuthenticator
{
    public function supports(Request $request): ?bool
    {
        // Vérifie que la requête est un POST sur la route "app_login"
        return $request->attributes->get('_route') === 'app_login' && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        // Récupère l'email et le mot de passe du formulaire de connexion
        $email = $request->request->get('email', '');
        $password = $request->request->get('password', '');

        // Retourne un Passport pour l'authentification avec l'email et le mot de passe
        return new Passport(
            new UserBadge($email), // Utilise l'email pour identifier l'utilisateur
            new PasswordCredentials($password) // Utilise le mot de passe pour authentifier
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Redirige vers la page d'accueil après une authentification réussie
        return new RedirectResponse('/profile'); // Assure-toi que la route 'app_home' est correcte
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        // Si l'authentification échoue, retourne une réponse JSON avec un message d'erreur
        return new JsonResponse(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
    }

    // Si tu veux gérer ce cas pour les utilisateurs non authentifiés
    // public function start(Request $request, ?AuthenticationException $authException = null): Response
    // {
    //     // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
    //     return new RedirectResponse($this->urlGenerator->generate('app_login'));
    // }
}
