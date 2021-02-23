<?php

namespace Tests\Unit;
use App\Models\User;
use PHPUnit\Framework\TestCase;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
   	/** @test */
    public function a_user_has_project()
    {

        $user = User::factory()->make();
		
        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
