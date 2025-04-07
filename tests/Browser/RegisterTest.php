<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Test User')
                ->type('email', 'newuser@example.com')
                ->type('password', 'password123')
                ->type('password_confirmation', 'password123')
                ->press('REGISTER')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard');
        });
    }
}
