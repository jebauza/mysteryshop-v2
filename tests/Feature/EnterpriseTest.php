<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;


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
        $enterprise = factory(Enterprise::class)->make();
        $response = $this->actingAs($user)
            ->postJson(route('enterprises.store'), [
            'name' => $enterprise->name,
            'address' => $enterprise->address
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
        $enterprise = factory(Enterprise::class)->create();
        $response = $this->actingAs($user)
            ->putJson(route('enterprises.update',$enterprise->id), [
                'name' => $enterprise->name. Str::random(5),
                'address' => $enterprise->address
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
        $enterprise = factory(Enterprise::class)->create();
        $response = $this->actingAs($user)
            ->deleteJson(route('enterprises.destroy',$enterprise->id));
        $response->assertStatus(200);
    }
}
