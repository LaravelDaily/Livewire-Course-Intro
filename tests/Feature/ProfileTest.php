<?php

namespace Tests\Feature;

use App\Http\Livewire\Profile;
use App\Models\User;
use Database\Seeders\PermissionRoleTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\RoleUserTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Can see help text
     * @test
     * @return void
     */
    public function can_see_help_text()
    {
        Livewire::test(Profile::class)
            ->assertDontSee('Lorem ipsum')
            ->set('showHelp', true)
            ->assertSee('Lorem ipsum');
    }

    /**
     * Can edit profile
     * @test
     * @return void
     */
    public function can_edit_profile()
    {
        $this->actingAs(User::first());

        Livewire::test(Profile::class)
            ->set('user.name', auth()->user()->name)
            ->set('user.email', 'new@email.com')
            ->call('updateprofile');

        $this->assertTrue(User::where('email', 'new@email.com')->exists());
    }
}
