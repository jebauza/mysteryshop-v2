<?php

namespace Tests\Feature;

use App\Models\Establishment;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class EstablishmentTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('establishments.index'));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->getJson(route('establishments.show', $establishment->id));
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
        $establishment = factory(Establishment::class)->make();
        $response = $this->actingAs($user)
            ->postJson(route('establishments.store'), [
                'name' => $establishment->name,
                'address' => $establishment->address,
                'establishment_type_id' => $establishment->establishment_type_id,
                'client_id' => $establishment->client_id,
            ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_update()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $establishment = factory(Establishment::class)->create();
        $response = $this->actingAs($user)
            ->putJson(route('establishments.update',$establishment->id), [
                'name' => $establishment->name. Str::random(5),
                'address' => $establishment->address. Str::random(5),
                'establishment_type_id' => $establishment->establishment_type_id,
                'client_id' => $establishment->client_id,
            ]);
        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_delete()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $establishment = factory(Establishment::class)->create();
        $response = $this->actingAs($user)
            ->deleteJson(route('establishments.destroy',$establishment->id));
        $response->assertStatus(200);
    }
}
