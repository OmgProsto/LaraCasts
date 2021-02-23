<?php

namespace Tests\Unit;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */

    public function it_has_path()
    {
    	$project = Project::factory()->create();

    	$this->assertEquals('/projects/' . $project->id, $project->path());
    }

    /** @test */
    public function it_can_add_a_task()
    {
        $project = Project::factory()->create();

        $task = $project->addTask('test task');

        $this->assertCount(1, $project->tasks);

        $this->assertTrue($project->tasks->contains($task));
    }
    
}
