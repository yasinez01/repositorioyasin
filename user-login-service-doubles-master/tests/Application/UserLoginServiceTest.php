<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use MongoDB\Driver\Session;
use PHPUnit\Framework\TestCase;
use UserLoginService\Application\SessionManager;
use UserLoginService\Application\UserLoginServiceStub;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;
use UserLoginService\Infrastructure\FacebookSessionManager;
use UserLoginService\Tests\dobles\SessionManagerFake;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function errorLoginUserIfIsAlreadyLoggedIn()
    {
        $session = $this->createMock(FacebookSessionManager::class);
        $userLoginService = new UserLoginService($session);
        $user = new User("name");
        $this->expectExceptionMessage('User already logged in');
        $userLoginService->manualLogin($user);
        $userLoginService->manualLogin($user);
    }
    /**
     * @test
     */
    public function errorWhileManuallyLoggedIn(){
        $session = $this->createMock(FacebookSessionManager::class);
        $userLoginService = new UserLoginService($session);
        $user = new User("name");
        $userLoginService->manualLogin($user);
        $this->assertContains($user,$userLoginService->getLoggedUsers());
    }
    /**
     * @test
     */
    public function errorcheckingnumberofsessions(){
        $Stub = $this->createMock(FacebookSessionManager::class);
        $Stub->method('getSessions')->willReturn(1);
        $UserLoginService= new UserLoginService($Stub);
        $number=$UserLoginService->getExternalSessions();
        $this->assertEquals(1,$number);
    }
    /**
     * @test
     */
    public function userNotLoggedInExternal(){
        $session= new SessionManagerFake();
        $bool=$session->login("YasinEz","2001yasin");
        $this->assertTrue($bool);
    }
    /**
     * @test
     */
    public function FacebookLogin(){
        $sessionmanager = \Mockery::mock(SessionManager::class);
        $userLoginService = new UserLoginService($sessionmanager);
        $user = new User("Yasin");
        $sessionmanager
            ->allows()
            ->login("Yasin","2001")
            ->andReturnTrue();
        $sucess = $userLoginService->login($user->getUserName(),"2001");
        $this->assertEquals("Login correcto",$sucess);
    }
    /**
     * @test
     */
    public function userLogoutFromLocalAndExternalSession(){
        $sessionmanager = \Mockery::spy(SessionManager::class);
        $userLoginService = new UserLoginService($sessionmanager);
        $user = new User("Yasin");
        $userLoginService->manualLogin($user);
        $sessionmanager
            ->allows()
            ->logout($user->getUserName())
            ->andReturnTrue();
        $sucess = $userLoginService->logout($user);
        $sessionmanager
            ->shouldHaveReceived()
            ->logout($user->getUserName());
        $this->assertEquals("ok",$sucess);


    }

}
