<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Stok;

use App\Models\Menu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StokControllerTest extends TestCase
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
    public function it_displays_index_view_with_stoks(): void
    {
        $stoks = Stok::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('stoks.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.stoks.index')
            ->assertViewHas('stoks');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_stok(): void
    {
        $response = $this->get(route('stoks.create'));

        $response->assertOk()->assertViewIs('app.stoks.create');
    }

    /**
     * @test
     */
    public function it_stores_the_stok(): void
    {
        $data = Stok::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('stoks.store'), $data);

        $this->assertDatabaseHas('stoks', $data);

        $stok = Stok::latest('id')->first();

        $response->assertRedirect(route('stoks.edit', $stok));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_stok(): void
    {
        $stok = Stok::factory()->create();

        $response = $this->get(route('stoks.show', $stok));

        $response
            ->assertOk()
            ->assertViewIs('app.stoks.show')
            ->assertViewHas('stok');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_stok(): void
    {
        $stok = Stok::factory()->create();

        $response = $this->get(route('stoks.edit', $stok));

        $response
            ->assertOk()
            ->assertViewIs('app.stoks.edit')
            ->assertViewHas('stok');
    }

    /**
     * @test
     */
    public function it_updates_the_stok(): void
    {
        $stok = Stok::factory()->create();

        $menu = Menu::factory()->create();

        $data = [
            'jumlah' => $this->faker->randomNumber(0),
            'menu_id' => $menu->id,
        ];

        $response = $this->put(route('stoks.update', $stok), $data);

        $data['id'] = $stok->id;

        $this->assertDatabaseHas('stoks', $data);

        $response->assertRedirect(route('stoks.edit', $stok));
    }

    /**
     * @test
     */
    public function it_deletes_the_stok(): void
    {
        $stok = Stok::factory()->create();

        $response = $this->delete(route('stoks.destroy', $stok));

        $response->assertRedirect(route('stoks.index'));

        $this->assertModelMissing($stok);
    }
}
