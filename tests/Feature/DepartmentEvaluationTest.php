<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\DepartmentEvaluation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DepartmentEvaluationTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->getJson(route('department_evaluations.index'));
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
        $departEvaluation = factory(DepartmentEvaluation::class)->make([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('department_evaluations.store'), $departEvaluation->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $user = factory(User::class)->create();
        $departEvaluation = factory(DepartmentEvaluation::class)->create();
           
        $response = $this->actingAs($user)->getJson(route('department_evaluations.show', $departEvaluation->id));
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
        $departEvaluation = factory(DepartmentEvaluation::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->putJson(route('department_evaluations.update',$departEvaluation->id), [
                'date' => Carbon::createFromFormat('Y-m-d',$departEvaluation->date)->subWeek(2)->toDateString(),
                'time' => '18:4'.rand(0,9),
                'comment' => Str::random(50),
                'employee_name' => $departEvaluation->name.'_'.Str::random(5),
                'department_id' => $departEvaluation->department_id,
                'user_id' => $departEvaluation->user_id
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
        $departEvaluation = factory(DepartmentEvaluation::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->deleteJson(route('department_evaluations.destroy',$departEvaluation->id));

        $response->assertStatus(200)
            ->assertJsonStructure(['messenge']);
    }
}
