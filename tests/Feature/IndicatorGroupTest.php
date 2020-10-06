<?php

namespace Tests\Feature;

use App\Models\IndicatorGroup;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IndicatorGroupTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @return void
     */
    public function test_it_can_list()
    {
        $response = $this->getJson(route('indicator_groups.index'));
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
        $model = factory(IndicatorGroup::class)->create();

        $response = $this->actingAs($user)
            ->postJson(route('indicator_groups.store'), $model->toArray());

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }

    /**
     * @return void
     */
    public function test_it_can_show()
    {
        $model = factory(IndicatorGroup::class)->create();

        $response = $this->getJson(route('indicator_groups.show', $model->id));
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
        $model = factory(IndicatorGroup::class)->create();

        $response = $this->actingAs($user)
            ->putJson(route('indicator_groups.update',$model->id), [
                'name' => $model->name."_".Str::random(4),
                'description' => $model->description."_".Str::random(2),
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
        $model = factory(IndicatorGroup::class)->create();

        $response = $this->actingAs($user)
            ->deleteJson(route('indicator_groups.destroy',$model->id));

        $response->assertStatus(200);
    }
}
