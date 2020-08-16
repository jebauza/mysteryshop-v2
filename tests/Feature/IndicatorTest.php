<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Client;
use App\Models\Enterprise;
use Illuminate\Support\Str;
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
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)
            ->postJson(route('clients.store'), $client->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $client = factory(Client::class)->create();
           
        $response = $this->getJson(route('clients.show', $client->id));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_update()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)
            ->putJson(route('clients.update',$client->id), [
                'name' => $client->name."_".Str::random(4),
                'address' => $client->address."_".Str::random(2),
                'contract_number' => Str::random(8),
                'enterprise_id' => $client->enterprise->id
            ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_destroy()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)
            ->deleteJson(route('clients.destroy',$client->id));

        $response->assertStatus(200)
            ->assertJsonStructure(['messenge']);
    }
}
