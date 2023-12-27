<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Jenis;

use App\Models\Kategori;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_jenis(): void
    {
        $allJenis = Jenis::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-jenis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis.index')
            ->assertViewHas('allJenis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_jenis(): void
    {
        $response = $this->get(route('all-jenis.create'));

        $response->assertOk()->assertViewIs('app.all_jenis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_jenis(): void
    {
        $data = Jenis::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-jenis.store'), $data);

        $this->assertDatabaseHas('jenis', $data);

        $jenis = Jenis::latest('id')->first();

        $response->assertRedirect(route('all-jenis.edit', $jenis));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_jenis(): void
    {
        $jenis = Jenis::factory()->create();

        $response = $this->get(route('all-jenis.show', $jenis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis.show')
            ->assertViewHas('jenis');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_jenis(): void
    {
        $jenis = Jenis::factory()->create();

        $response = $this->get(route('all-jenis.edit', $jenis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis.edit')
            ->assertViewHas('jenis');
    }

    /**
     * @test
     */
    public function it_updates_the_jenis(): void
    {
        $jenis = Jenis::factory()->create();

        $kategori = Kategori::factory()->create();

        $data = [
            'nama_jenis' => $this->faker->text(255),
            'kategori_id' => $kategori->id,
        ];

        $response = $this->put(route('all-jenis.update', $jenis), $data);

        $data['id'] = $jenis->id;

        $this->assertDatabaseHas('jenis', $data);

        $response->assertRedirect(route('all-jenis.edit', $jenis));
    }

    /**
     * @test
     */
    public function it_deletes_the_jenis(): void
    {
        $jenis = Jenis::factory()->create();

        $response = $this->delete(route('all-jenis.destroy', $jenis));

        $response->assertRedirect(route('all-jenis.index'));

        $this->assertModelMissing($jenis);
    }
}
