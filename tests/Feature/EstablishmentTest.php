<?php

namespace Tests\Feature;

use App\Models\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EstablishmentTest extends TestCase
{
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
}
