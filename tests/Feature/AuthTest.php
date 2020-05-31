<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_me_informtion()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->getJson(route('auth.me'));
        $response->assertStatus(200)
            //->assertJsonStructure(['data'])
            //->assertSee('Usuarios')
            ->dumpHeaders()
            ->dump();
    }
}
