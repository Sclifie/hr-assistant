<?php

namespace Tests\Feature\Livewire;

use App\Models\Interview;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowInterviewTest extends TestCase
{
    use RefreshDatabase, InteractsWithExceptionHandling;
    /** @test */
    public function test_display_interview()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $interview = Interview::factory()
            ->create();

        $response = $this->actingAs($user)->get(route('interview.index'));
        $response->assertStatus(200);

    }
    
    public function test_display_interview_without_interview()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('interview.index'))
            ->assertStatus(200);
    }
    
    public function test_displays_more_that_first_page_interview()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $interview = Interview::factory()
            ->count(40)
            ->create();
        
        $response = $this->actingAs($user->first())->get(route('interview.index',['page' => 2]));
        $response->assertStatus(200);
    }
}
