<?php

namespace Tests\Feature\Modul;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateModulTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test halaman create dapat diakses.
     */

    public function test_edit_modul_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.modul.edit', ['id' => 1]));
        $response->assertStatus(302);
    }
}
