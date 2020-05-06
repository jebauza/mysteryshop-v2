<?php

namespace Tests\Feature;

use App\Models\EstablishmentType;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class EstablishmentTypeTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_it_can_list()
    {
        $response = $this->getJson(route('establishment_types.index'));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $type = factory(EstablishmentType::class)->create();
        $response = $this->getJson(route('establishment_types.show', $type->id));
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
        $type = factory(EstablishmentType::class)->make();
        $response = $this->actingAs($user)
            ->postJson(route('establishment_types.store'), [
                'name' => $type->name,
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
        $type = factory(EstablishmentType::class)->create();
        $response = $this->actingAs($user)
            ->putJson(route('establishment_types.update',$type->id), [
                'name' => $type->name. Str::random(5),
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
        $type = factory(EstablishmentType::class)->create();
        $response = $this->actingAs($user)
            ->deleteJson(route('enterprises.destroy',$type->id));
        $response->assertStatus(200);
    }
}
