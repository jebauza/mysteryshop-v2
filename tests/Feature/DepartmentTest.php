<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DepartmentTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->getJson(route('departments.index'));
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
        $departament = factory(Department::class)->make();

        $response = $this->actingAs($user)
            ->postJson(route('departments.store'), $departament->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $user = factory(User::class)->create();
        $departament = factory(Department::class)->create();
           
        $response = $this->actingAs($user)->getJson(route('departments.show', $departament->id));
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
        $departament = factory(Department::class)->create();

        $response = $this->actingAs($user)
            ->putJson(route('departments.update',$departament->id), [
                'name' => $departament->name."_".Str::random(4),
                'establishment_id' => $departament->establishment_id,
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
        $departament = factory(Department::class)->create();

        $response = $this->actingAs($user)
            ->deleteJson(route('departments.destroy',$departament->id));

        $response->assertStatus(200)
            ->assertJsonStructure(['messenge']);
    }


}
