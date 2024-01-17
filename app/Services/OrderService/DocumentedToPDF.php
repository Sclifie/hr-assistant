<?php

namespace App\Services\OrderService;

interface DocumentedToPDF
{
    /**
     * Обеспечивает поддержку для генерации PDF
     * Возвращает массив для генерации PDF
     * @return array|false <string, string>
     */
    public function prepareForPDF() : array|false;
    
    
    /**
     * Должен вернуть путь до файла
     */
    public function generatePDF() : string;
  
}