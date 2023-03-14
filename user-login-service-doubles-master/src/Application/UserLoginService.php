<?php

namespace UserLoginService\Application;

use Exception;
use UserLoginService\Domain\User;
use UserLoginService\Infrastructure\FacebookSessionManager;

class UserLoginService
{
    private array $loggedUsers = [];
    private SessionManager $session;
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * @throws Exception
     */
    public function manualLogin(User $user): void{
        if(in_array($user,$this->loggedUsers)) {
            throw new Exception ('User already logged in');
        }
        $this->loggedUsers[]= $user;
    }
    public function getLoggedUsers(): array{
        return $this->loggedUsers;
    }
    public function getExternalSessions(): int{
        return $this->session->getSessions();
    }
    /*public function getExternalSessions(): int{
        $FacebookSessionManager =new FacebookSessionManager();
        return $FacebookSessionManager->getSessions();
    }*/
    public function login(string $userName, string$password): string{
        //$FacebookSessionManager = new FacebookSessionManager();
        $boleano=$this->session->login($userName, $password);
        if($boleano){
            $user = new User($userName);
            $this->manualLogin($user);
            return "Login correcto";
        }else{
            return "Login incorrecto";
        }
    }
    public function logout(User $user): string{
        if(!in_array($user,$this->loggedUsers)) {
            return "User not found";
        }
        $this->session->logout($user->getUserName());
        return "ok";
    }
}