<?php

namespace Tests\Feature\Modul;

use App\Livewire\App\Division;
use App\Livewire\App\ModulCreate;
use App\Models\Division as ModelsDivision;
use App\Models\ELeaning\Modul;
use Livewire\Livewire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateModulTest extends TestCase
{

    use RefreshDatabase;


    /**
     * Test halaman create dapat diakses.
     */

    public function test_create_modul_page_rendered(): void
    {
        $response = $this->get(route('app.e-learning.modul.create'));
        $response->assertStatus(302);
    }


    /**
     * Test store modul dengan data valid.
     */
    public function test_store_modul_with_valid_data()
    {
        $division = ModelsDivision::create([
            'name' => 'Division 1',
            'slug' => Str::slug('Division 1'),
            'description' => 'Deskripsi Division 1',
            'logo' => 'logo.png',
        ]);
        $data = [
            'name' => 'Modul Test',
            'slug' => Str::slug('Modul Test'),
            'description' => 'Deskripsi Modul Test',
            'section' => 'Section 1',
            'type' => 'Type 1',
            'link' => 'https://example.com',
            'division_id' => $division->id,
        ];

        $response = Modul::create($data);
        $this->assertDatabaseHas('moduls', $data);

        // Livewire::test(ModulCreate::class)
        //     ->set($data)
        //     ->call('store')
        //     ->assertDatabaseHas('moduls', $data);
    }
}
