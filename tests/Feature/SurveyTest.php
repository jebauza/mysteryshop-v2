<?php

namespace Tests\Feature;

use App\Models\Survey;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class SurveyTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('surveys.index'));
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
        $model = factory(Survey::class)->create();

        $response = $this->actingAs($user)
            ->postJson(route('surveys.store'), $model->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $model = factory(Survey::class)->create();

        $response = $this->getJson(route('surveys.show', $model->id));
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
        $client = factory(Survey::class)->create();

        $response = $this->actingAs($user)
            ->putJson(route('surveys.update',$client->id), [
                'name' => $client->name."_".Str::random(4),
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
        $model = factory(Survey::class)->create();

        $response = $this->actingAs($user)
            ->deleteJson(route('surveys.destroy',$model->id));

        $response->assertStatus(200);
    }
}
