<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Models\EstablishmentEvaluation;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;

class EstablishmentEvaluationTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->getJson(route('establishment_evaluations.index'));
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
        $estabEvaluation = factory(EstablishmentEvaluation::class)->make([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('establishment_evaluations.store'), $estabEvaluation->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $user = factory(User::class)->create();
        $estabEvaluation = factory(EstablishmentEvaluation::class)->create();
           
        $response = $this->actingAs($user)->getJson(route('establishment_evaluations.show', $estabEvaluation->id));
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
        $estabEvaluation = factory(EstablishmentEvaluation::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->putJson(route('establishment_evaluations.update',$estabEvaluation->id), [
                'date' => Carbon::createFromFormat('Y-m-d',$estabEvaluation->date)->subDays(2)->toDateString(),
                'time' => '15:2'.rand(0,9),
                'comment' => Str::random(50),
                'employee_name' => '',
                'establishment_id' => $estabEvaluation->establishment_id,
                'user_id' => $estabEvaluation->user_id
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
        $estabEvaluation = factory(EstablishmentEvaluation::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->deleteJson(route('establishment_evaluations.destroy',$estabEvaluation->id));

        $response->assertStatus(200)
            ->assertJsonStructure(['messenge']);
    }
}
