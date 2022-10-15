<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @return JsonResponse
     * @Route("api/login", name="api_login", methods={"GET", "POST"})
     */
    public function login()
    {
        $user = $this->getUser();

        return $this->json([
            'roles' => $user->getRoles(),
        ]);
    }
}