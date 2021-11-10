<?php

namespace App\Controller;

use App\Entity\Userlogin;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route(path:'/api_storage/login', name:'api_login', methods:['POST'])]
    public function login(UserRepository $userloginRepo)
    {
       
        $em = $this->getDoctrine()->getManager();
        

       $users = $this->getUser();
       if($users){
            return $this->json([
                'username' => $users->getUsername(),
                'roles' => $users->getRoles(),
        ]);
        $userlogin = new Userlogin();

        $authToken = random_int(100,999)."".random_int(100,999);
        $userlogin->setAuthtoken($authToken);

        $userlogin->setUsers($users);

        $em->persist($userlogin);
        $em->flush();

       }

    }


    #[Route(path:'/api_storage/logout',name: 'api_logout')]
    public function logout()
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
