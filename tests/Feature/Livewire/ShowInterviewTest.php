<?php

namespace Tests\Feature\Livewire;

use App\Models\Interview;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowInterviewTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function test_display_interview()
    {
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $interview = Interview::factory()
            ->create();
       
        $this->actingAs($user)->get(route('interview.index'))->assertStatus(200);
    }
    
}
