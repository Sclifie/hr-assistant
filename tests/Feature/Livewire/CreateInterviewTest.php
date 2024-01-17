<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Pages\Interview\Create;
use App\Models\Interview;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateInterviewTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_renders_successfully_create()
    {
        Livewire::test(Create::class)
            ->assertStatus(200);
    }
    
    public function test_component_exists_on_the_page_create()
    {
        $this->get(route('interview.create'))
            ->assertSeeLivewire(Create::class);
    }
    
}
