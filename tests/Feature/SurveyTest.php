<?php

namespace Tests\Feature;

use App\Models\Indicator;
use App\User;
use Tests\TestCase;
use App\Models\Client;
use App\Models\Enterprise;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IndicatorTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('indicators.index'));
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
        $model = factory(Indicator::class)->create();

        $response = $this->actingAs($user)
            ->postJson(route('indicators.store'), $model->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $model = factory(Indicator::class)->create();

        $response = $this->getJson(route('indicators.show', $model->id));
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
        $client = factory(Indicator::class)->create();

        $response = $this->actingAs($user)
            ->putJson(route('indicators.update',$client->id), [
                'name' => $client->name."_".Str::random(4),
                'description' => $client->description."_".Str::random(2),
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
        $model = factory(Indicator::class)->create();

        $response = $this->actingAs($user)
            ->deleteJson(route('indicators.destroy',$model->id));

        $response->assertStatus(200);
    }
}
