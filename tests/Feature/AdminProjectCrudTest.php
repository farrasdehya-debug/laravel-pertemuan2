<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminProjectCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_accessing_admin(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_can_view_project_list(): void
    {
        $user = User::factory()->create();

        $project = Project::create([
            'title' => 'Project Test',
            'description' => 'Deskripsi project test',
            'teknologi' => 'Laravel & MySQL',
            'image' => 'project1.jpg',
            'status' => 'Selesai',
        ]);

        $response = $this->actingAs($user)->get('/admin/project');
        $response->assertStatus(200);
        $response->assertSee('Project Test');
    }

    public function test_admin_can_create_project(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/project', [
            'title' => 'Project Baru',
            'description' => 'Deskripsi project baru',
            'teknologi' => 'Vue & Laravel',
            'status' => 'In Progress',
        ]);

        $response->assertRedirect('/admin/project');
        $this->assertDatabaseHas('projects', [
            'title' => 'Project Baru',
            'status' => 'In Progress',
        ]);
    }

    public function test_admin_can_update_project(): void
    {
        $user = User::factory()->create();

        $project = Project::create([
            'title' => 'Project Lama',
            'description' => 'Deskripsi lama',
            'teknologi' => 'PHP',
            'image' => 'project1.jpg',
            'status' => 'In Progress',
        ]);

        $response = $this->actingAs($user)->put("/admin/project/{$project->id}", [
            'title' => 'Project Diperbarui',
            'description' => 'Deskripsi baru',
            'teknologi' => 'PHP & Laravel',
            'status' => 'Selesai',
        ]);

        $response->assertRedirect('/admin/project');
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Project Diperbarui',
            'status' => 'Selesai',
        ]);
    }

    public function test_admin_can_delete_project(): void
    {
        $user = User::factory()->create();

        $project = Project::create([
            'title' => 'Project Hapus',
            'description' => 'Akan dihapus',
            'teknologi' => 'Test',
            'image' => 'project1.jpg',
            'status' => 'In Progress',
        ]);

        $response = $this->actingAs($user)->delete("/admin/project/{$project->id}");
        $response->assertRedirect('/admin/project');
        $this->assertDatabaseMissing('projects', [
            'id' => $project->id,
        ]);
    }

    public function test_admin_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/logout');
        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}
