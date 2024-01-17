<?php

namespace App\Services\EmploeeService;

use App\Models\Employee;
use App\Models\Interview;
use App\Services\OrderService\DocumentedToPDF;

class EmployeeService implements DocumentedToPDF
{
    public function __construct(Employee $employee)
    {
    
    }
    /**
     * Отправляем человека в отпуск
     * */
    public function sendOnVocation(Employee $employee)
    {
        //Поменять статус
        //Создать документ об отпуске через Event реализовать метод
    }
    
    /**
     * Нанять человека на работу
     * */
    public function hire(Interview $interview) : Employee
    {
        // Нанять человека на работу
        // Создать модельку
    }
    
    public function prepareForPDF(): array|false
    {
        // TODO: Implement prepareForPDF() method.
    }
    
    public function generatePDF(): string
    {
        // TODO: Implement generatePDF() method.
    }
}