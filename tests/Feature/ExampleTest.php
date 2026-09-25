<?php

namespace Tests\Feature;
//ghaw4er56nta3etnoeklgihv jeaorguihearoitv uneroaihtveuoritv hboeruihtiouwentverui
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
