<?php

namespace Tests\Feature;

use App\Models\Client;
use App\User;
use Tests\TestCase;
use App\Models\Enterprise;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ClientTest extends TestCase
{
    use WithoutMiddleware;
    
    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('clients.index'));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_store()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $enterprise = factory(Enterprise::class)->create();
        $client = factory(Client::class)->make(['enterprise_id' => $enterprise->id]);
        $response = $this->actingAs($user)
            ->postJson(route('clients.store'), $client->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }
}
