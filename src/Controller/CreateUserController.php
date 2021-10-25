<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;

class CreateUserController
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * CreateUser constructor.
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function __invoke($data)
    {
        return $this->userManager->registerAccount($data);
    }
}