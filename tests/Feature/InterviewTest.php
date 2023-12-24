<?php

namespace Tests\Feature;

use App\Enums\InterviewStatusesEnum;
use App\Models\Interview;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class InterviewTest extends TestCase
{
    use RefreshDatabase;
    private function createPosition()
    {
        return Position::factory()
            ->create();
    }
    
    public function test_auth_user_can_create_interview_with_any_available_status(){
        
        $user = User::factory()->create();
        
        $position = $this->createPosition();
        
        foreach (InterviewStatusesEnum::cases() as $case){
            
            $interview = Interview::factory()
                ->status($case->value)
                ->make();
       
            $response = $this->actingAs($user)->post(route('interview.store'), $interview
                ->only([
                    'first_name',
                    'last_name',
                    'email',
                    'status',
                    'position_id',
                ]));
            
            $response->assertStatus(302);
        }
    }
}
