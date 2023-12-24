<?php

namespace App\Enums;

enum PositionNameEnum :string
{
    case DEVELOPER = 'Разработчик';
    case MANAGER = 'Менеджер';
    case DESIGNER = 'Дизайнер';
    case MARKETER = 'Маркетолог';
    case DIRECTOR = 'Директор';
}
