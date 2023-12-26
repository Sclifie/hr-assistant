<?php

namespace App\Livewire\Forms;

use App\Models\Interview;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Locked;
use Livewire\Form;

class InterviewForm extends Form
{
    /*Почти DTO на уровне From Client*/
    #[Locked]
    public int $id;
    public int $position_id;
    public string $email;
    public string $first_name;
    public string $last_name;
    public string $status;
    public int|null $employee_id;
    
    public $rules = [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'email', 'max:254'],
        'status' => ['required'],
        'employee_id' => ['nullable', 'integer'],
        'position_id' => ['required','exists:App\Models\Position,id']
    ];
    
    public $as = [
    
    ];
    
    private $attributesNames;
    
    public function setUp(Interview $interview)
    {
        foreach ($interview->toArray() as $key => $value) {
            // Проверяем, существует ли свойство с именем $key в объекте
            if (property_exists($this, $key)) {
                // Присваиваем значение свойству объекта
                $this->$key = $value;
            }
        }
    }
    
    public function __toArray(): array
    {
        return [
            'id' => $this->id,
            'position_id' => $this->position_id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'status' => $this->status,
            ];
    }
}