<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;
    public function setId($id)
    {
        return $this->__id = 'drag-and-drop';
    }
    
    #[Validate(['mimes:jpg'])]
    public $image = null;
    
    public function removeImage(): void
    {
        if($this->image !== null){
            File::delete(public_path($this->image));
        }
        
        $this->image = null;
    }
    public function render() : Renderable
    {
        return view('components.drag-and-drop');
    }
}