<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use App\Facades\InterviewFacade;
use App\Services\InterviewService\InterviewService;
use Livewire\Attributes\On;
use Livewire\Component;
use WireUi\Traits\Actions;
use function Livewire\Volt\rules;

class Create extends Component
{
    use Actions;
    
    public InterviewForm $interviewForm;
    
    public Interview $interview;
    public $positionOptions;
    
    public function mount()
    {
        $this->interviewForm->reset();
        $this->positionOptions = Position::all();
    }
    
    #[On('interview-update')]
    public function updatePosition()
    {
        $this->positionOptions = Position::all();
    }
    
    public function deleteInterview()
    {
        $this->interview->delete();
        $this->redirect(route('interview.index'));
        $this->notification()->success('Удалено', 'Интервью удалено');
    }
    
    public function createInterview()
    {
        $validatedData = $this->interviewForm->validateForm();
        
        try {
            $this->interview = InterviewFacade::createInterview($validatedData);
        } catch (\Exception $exception) {
            $this->showDialog(description: $exception->getMessage());
        }
        
        $this->interviewForm->fill($this->interview);
        
        $this->redirect(route('interview.edit', ['interview' => $this->interview->path()]));
        
        $this->showDialog('info', 'OK', "Интервью создано<br> {$this->getLink()}");
    }
    
    private function getLink()
    {
        $route = route('interview.edit', ['interview' => $this->interview->path()]);
        return "<a class='text-xl text-green-500' href={$route}>Перейти к интервью</a>";
    }
    
    public function showDialog($icon = null, $title = null, $description = null): void
    {
        $this->dialog()->show([
            'icon' => $icon ?? 'error',
            'title' => $title ?? 'Error',
            'description' => $description ?? trans('interview.Interview Not Saved Please Connect with Administrator.'),
        ]);
    }
    
    
    public function render()
    {
        return view('livewire.pages.interview.create');
    }
}
