<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use TestCase;
use Illuminate\Support\Facades\Session;

class UserTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
//    public function testExample() {
//        $this->assertTrue(true);
//    }

    public function testLoginWithAdminRole() {
        $this->visit('/admin/login')
                ->see('Espace Admin | Connexion')
                ->type(env('USER_EMAIL', 'admin@admin.com'), 'email')
                ->type(env('USER_PASSWORD', 'admin123'), 'password')
                ->check('remember')
                ->press('Se connecter')
//            ->seePageIs('/admin/agenda')
                ->see('OsteoRDV');
    }

    public function testLoginWithSecretariatRole() {
        $this->visit('/admin/login')
                ->see('Espace Admin | Connexion')
                ->type('dinhbaduy@gmail.com', 'email')
                ->type('Secretariat57100', 'password')
                ->check('remember')
                ->press('Se connecter')
//            ->seePageIs('/admin/agenda')
                ->see('OsteoRDV');
    }

    public function testLoginWithProfessionalRole() {
        $this->visit('/admin/login')
                ->see('Espace Admin | Connexion')
                ->type('jodntr@gmail.com', 'email')
                ->type('Pro57100', 'password')
                ->check('remember')
                ->press('Se connecter')
            ->seePageIs('/');
//                ->see('OsteoRDV');
    }
    
     public function testWrongLoginOrPassword() {
        $this->visit('/admin/login')
                ->see('Espace Admin | Connexion')
                ->type('wrongusername@gmail.com', 'email')
                ->type('wrongpwd', 'password')                
                ->press('Se connecter')
            ->seePageIs('/admin/login');
//                ->see('OsteoRDV');
    }

}
