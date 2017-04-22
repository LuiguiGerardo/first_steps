<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAccountLink()
    {
    	//Usuario anonimo
        $this->visit('/')->dontsee('Account');
        //creando usuario
       $user=$this->createUser();
       //si el usuario esta logeando
       $this->actingAs($user)
       		->visit('/')
       		->see('Account');
       	//si el usuario hace click en Account
       	$this->click('Account')
       		->seePageis('account')
       		->see('My profile');
    }
}
