<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChangePasswordTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testChangePassword()
    {
        $user = $this->createUser();

        $this->actingAs($user)
        	->visit('account')
        	->click('Change password')
        	->seePageIs('account/password')
        	->type('123456','current_password')
        	->type('newpassword','password')
        	->type('newpassword','password_confirmation') //para tipear
        	->press('Change password')
        	->seePageIs('account')
        	->see('Your password has been changed');

       	$this->assertTrue(
       		Hash::check('newpassword',$user->password), //para verificar si contraseña es igual a la de BD
       		'The user password was not changed'
       		);


    }
}
