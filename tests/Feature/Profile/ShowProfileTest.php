<?php

namespace Tests\Feature\Profile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowProfileTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test profile rendered.
     */

    public function test_show_profile_page_rendered(): void
    {
        $response = $this->get(route('app.profile'));
        $response->assertStatus(302);
    }
}
