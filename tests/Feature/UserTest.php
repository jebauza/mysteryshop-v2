<?php

namespace Tests\Feature;

use App\Models\Enterprise;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('users.index'));
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $user = factory(User::class)->create();
        $response = $this->getJson(route('users.show', $user->id));
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
        $user_new = factory(User::class)->make();

        $response = $this->actingAs($user)
            ->postJson(route('users.store'),
                    array_merge($user_new->toArray(), [
                        'password_confirmation' => $user_new->password,
                        'password' => $user_new->password,
                    ])
            );

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
        $user_update = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->putJson(route('users.update', $user_update->id), [
                'name' => $user_update->name . Str::random(5),
                'surname' => $user_update->surname,
                'password' => $user_update->password,
                'email' => $user_update->email,
            ]);
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_delete()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user_new = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->deleteJson(route('users.destroy', $user_new->id));
        $response->assertStatus(200);
    }
}
