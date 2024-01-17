<?php

namespace Livewire;

use App\Livewire\Pages\Interview\Edit;
use App\Models\Interview;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditInterviewTest extends TestCase
{
    use RefreshDatabase;
    public function test_visit_interview_edit()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $position = Position::factory()->create();
        
        $interview = Interview::factory()
            ->create();
        
        Livewire::actingAs($user)
            ->test(Edit::class,['interview' => $interview])
            ->assertSee($interview->id);
    }
    public function test_edit_interview_render_correct()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $position = Position::factory()->create();
        $interview = Interview::factory()
            ->create();
        Livewire::actingAs($user)
            ->test(Edit::class,['interview' => $interview])
            ->assertViewHas('interviewForm',function ($interviewForm) use ($interview){
                return $interviewForm->id === $interview->id;
            });
    }
}