<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Pemesanan;

use App\Models\Meja;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PemesananControllerTest extends TestCase
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
    public function it_displays_index_view_with_pemesanans(): void
    {
        $pemesanans = Pemesanan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pemesanans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pemesanans.index')
            ->assertViewHas('pemesanans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pemesanan(): void
    {
        $response = $this->get(route('pemesanans.create'));

        $response->assertOk()->assertViewIs('app.pemesanans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pemesanan(): void
    {
        $data = Pemesanan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pemesanans.store'), $data);

        $this->assertDatabaseHas('pemesanans', $data);

        $pemesanan = Pemesanan::latest('id')->first();

        $response->assertRedirect(route('pemesanans.edit', $pemesanan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pemesanan(): void
    {
        $pemesanan = Pemesanan::factory()->create();

        $response = $this->get(route('pemesanans.show', $pemesanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pemesanans.show')
            ->assertViewHas('pemesanan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pemesanan(): void
    {
        $pemesanan = Pemesanan::factory()->create();

        $response = $this->get(route('pemesanans.edit', $pemesanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pemesanans.edit')
            ->assertViewHas('pemesanan');
    }

    /**
     * @test
     */
    public function it_updates_the_pemesanan(): void
    {
        $pemesanan = Pemesanan::factory()->create();

        $meja = Meja::factory()->create();

        $data = [
            'tanggal_pemesanan' => $this->faker->date(),
            'jam_mulai' => $this->faker->time(),
            'jam_selesai' => $this->faker->time(),
            'nama_pemesan' => $this->faker->text(255),
            'jumlah_pelanggan' => $this->faker->randomNumber(0),
            'meja_id' => $meja->id,
        ];

        $response = $this->put(route('pemesanans.update', $pemesanan), $data);

        $data['id'] = $pemesanan->id;

        $this->assertDatabaseHas('pemesanans', $data);

        $response->assertRedirect(route('pemesanans.edit', $pemesanan));
    }

    /**
     * @test
     */
    public function it_deletes_the_pemesanan(): void
    {
        $pemesanan = Pemesanan::factory()->create();

        $response = $this->delete(route('pemesanans.destroy', $pemesanan));

        $response->assertRedirect(route('pemesanans.index'));

        $this->assertModelMissing($pemesanan);
    }
}
