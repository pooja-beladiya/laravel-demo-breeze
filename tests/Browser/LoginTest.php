<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    public function test_user_can_login_using_breeze()
    {
        //$user = \App\Models\User::first();
        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password123')
                ->press('LOG IN')
                ->assertPathIs('/dashboard') // Breeze redirects to /dashboard after login
                ->assertSee('Dashboard');
        });
    }
}
