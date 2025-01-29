<?php

namespace Tests\Feature\Member;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowProfileMemberTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test member rendered.
     */

    public function test_show_profile_member_page_rendered(): void
    {
        $response = $this->get(route('app.member.show', ['name' => 'User', 'id' => 1]));
        $response->assertStatus(302);
    }
}
