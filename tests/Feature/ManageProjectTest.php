<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectTest extends TestCase
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
    public function guests_cannot_manage_projects()
    {
        $project = Project::factory()->create();

        $this->get('/projects')->assertRedirect('/login');
        $this->get('/projects/create')->assertRedirect('/login');
        $this->post('/projects', $project->toArray())->assertRedirect('/login');
        $this->get($project->path())->assertRedirect('/login');

    }

    /** @test */

    public function a_user_can_create_a_project()
    {

        $this->withoutExceptionHandling();

        $this->signIn();
        
        

        $this->actingAs(User::factory()->create());

        $this->get('/projects/create')->assertStatus(200);

        $projectAttrs = [
            'title'=> $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        

        $this->post('/projects', $projectAttrs)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $projectAttrs);

        $this->get('/projects')->assertSee($projectAttrs['title']);
    }

    /** @test */

    public function a_user_can_view_their_project()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);


    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);

    }

    /** @test */

    public function an_auth_user_cannot_view_the_projects_of_others()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */

    public function a_project_requires_a_title()
    {
        $this->signIn();

        $projectAttrs = Project::factory()->raw(['title' => '']);

        $this->post('/projects', $projectAttrs)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->signIn();

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