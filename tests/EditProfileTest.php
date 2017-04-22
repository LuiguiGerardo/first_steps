<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditProfileTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {      
       $user = $this->createUser();

       $this->actingAs($user)
       		->visit('account')
       		->click('Edit profile')
       		->seePageIs('account/edit-profile')
       		->seeInField('name','pruebax')
       		->type('pruebay','name')
       		->type('pruebay','username')
       		->press('Update profile')
       		->seePageIs('account')
       		->see('Your profile has been updated')
       		->seeInDataBase('users',[
       				'email'=>$user->email,
       				'name'=>'pruebay',
       				'username'=>'pruebay'
       			]);

    }
}
