<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Meja;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MejaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_mejas(): void
    {
        $mejas = Meja::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('mejas.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.mejas.index')
            ->assertViewHas('mejas');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_meja(): void
    {
        $response = $this->get(route('mejas.create'));

        $response->assertOk()->assertViewIs('app.mejas.create');
    }

    /**
     * @test
     */
    public function it_stores_the_meja(): void
    {
        $data = Meja::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('mejas.store'), $data);

        $this->assertDatabaseHas('mejas', $data);

        $meja = Meja::latest('id')->first();

        $response->assertRedirect(route('mejas.edit', $meja));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_meja(): void
    {
        $meja = Meja::factory()->create();

        $response = $this->get(route('mejas.show', $meja));

        $response
            ->assertOk()
            ->assertViewIs('app.mejas.show')
            ->assertViewHas('meja');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_meja(): void
    {
        $meja = Meja::factory()->create();

        $response = $this->get(route('mejas.edit', $meja));

        $response
            ->assertOk()
            ->assertViewIs('app.mejas.edit')
            ->assertViewHas('meja');
    }

    /**
     * @test
     */
    public function it_updates_the_meja(): void
    {
        $meja = Meja::factory()->create();

        $data = [
            'nomor_meja' => $this->faker->randomNumber(0),
            'kapasitas' => $this->faker->randomNumber(0),
            'status' => 'Dipesan',
        ];

        $response = $this->put(route('mejas.update', $meja), $data);

        $data['id'] = $meja->id;

        $this->assertDatabaseHas('mejas', $data);

        $response->assertRedirect(route('mejas.edit', $meja));
    }

    /**
     * @test
     */
    public function it_deletes_the_meja(): void
    {
        $meja = Meja::factory()->create();

        $response = $this->delete(route('mejas.destroy', $meja));

        $response->assertRedirect(route('mejas.index'));

        $this->assertModelMissing($meja);
    }
}
