<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_authenticated_users_can_create_projects()
    {

        $projectAttrs = Project::factory()->raw();

        $this->post('/projects', $projectAttrs)->assertRedirect('/login');
    }

    /** @test */
    public function only_authenticated_users_can_view_projects()
    {
        $this->get('/projects')->assertRedirect('/login');
    }

    /** @test */
    public function guests_cannot_view_a_single_projects()
    {
        $project = Project::factory()->create();

        $this->get($project->path())->assertRedirect('/login');
    }

    /** @test */

    public function a_user_can_create_a_project()
    {

        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        $projectAttrs = [
            'title'=> $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        

        $this->post('/projects', $projectAttrs)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $projectAttrs);

        $this->get('/projects')->assertSee($projectAttrs['title']);
    }

    /** @test */
<<<<<<< HEAD
    public function a_user_can_view_their_project()
    {
        $this->be(User::factory()->create());

        $this->withoutExceptionHandling();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);
=======
    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->create();
>>>>>>> 28c78127c2086fd60c006692250c29013194d3a3

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);

    }

    /** @test */
<<<<<<< HEAD
    public function an_auth_user_cannot_view_the_projects_of_others()
    {
        $this->be(User::factory()->create());

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
=======
>>>>>>> 28c78127c2086fd60c006692250c29013194d3a3
    public function a_project_requires_a_title()
    {
        $this->actingAs(User::factory()->create());

        $projectAttrs = Project::factory()->raw(['title' => '']);

        $this->post('/projects', $projectAttrs)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->actingAs(User::factory()->create());

        $projectAttrs = Project::factory()->raw(['description' => '']);

        $this->post('/projects', $projectAttrs)->assertSessionHasErrors('description');
    }


    /** @test */
    public function it_belongs_to_an_owner()
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf('App\Models\User', $project->owner);
    }

}