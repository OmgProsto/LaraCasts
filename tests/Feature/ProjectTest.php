<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */

    public function a_user_can_create_a_project()
    {

        $this->withoutExceptionHandling();

        $projectAttrs = [
            'title'=> $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $projectAttrs)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $projectAttrs);

        $this->get('/projects')->assertSee($projectAttrs['title']);
    }
}
