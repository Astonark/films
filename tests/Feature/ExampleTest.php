<?php

namespace Tests\Feature;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_named_route() {
        $response = $this->get('films');

        $response->assertStatus(200);
    }
}
