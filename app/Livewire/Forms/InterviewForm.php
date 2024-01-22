<?php

namespace App\Livewire\Forms;

use App\Http\Requests\InterviewRequest;
use App\Models\Interview;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Locked;
use Livewire\Form;
use function Livewire\invade;

class InterviewForm extends Form
{
    public ?int $id;
    public ?int $position_id;
    public ?int $employee_id;
    
    public ?string $email;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $status;
    
    /**
     * Заполнение формы в случае если она используется для редактирования записей
     * @deprecated reason $this→fill()
     */
    public function setUp(Interview $interview) :void
    {
        foreach ($interview->toArray() as $key => $value) {
            // Проверяем, существует ли свойство с именем $key в объекте
            if (property_exists($this, $key)) {
                // Присваиваем значение свойству объекта
                $this->$key = $value;
            }
        }
    }
    
    /**
     * В связи с тем что изначально мы были нацелены на контроллеры,
     * будем использовать ФормРеквесты для Валидации
     */
    public function validateForm() : array
    {
//        Для рефактора nameConvervion ReflectionClassName + Request
        $requestValidator = new InterviewRequest();
        
        return $this->validate(
            rules: $requestValidator->rules(),
            attributes: $requestValidator->attributes()
        );
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