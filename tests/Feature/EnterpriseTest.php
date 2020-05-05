<?php

namespace Tests\Feature;

use App\Enterprise;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EnterpriseTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('enterprises.index'));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $enterprise = factory(Enterprise::class)->create();
        $response = $this->getJson(route('enterprises.show', $enterprise->id));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_create()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $enterprise = factory(Enterprise::class)->create();
        $response = $this->actingAs($user)
            ->postJson(route('enterprises.store'), [
            'name' => $enterprise->name,
            'address' => $enterprise->address
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }
}
