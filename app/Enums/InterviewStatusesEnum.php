<?php

namespace App\Enums;

enum InterviewStatusesEnum :string implements Translatable
{
    const TRANSLATION_PREFIX = 'interview.';
    case OPEN = 'open';
    case PASSED = 'passed';
    case REJECTED = 'rejected';
    
    case ARCHIVED = 'archived';
    
    public function translation() : string
    {
        return match ($this) {
            InterviewStatusesEnum::OPEN => trans(self::TRANSLATION_PREFIX . InterviewStatusesEnum::OPEN->value),
            InterviewStatusesEnum::PASSED => trans(self::TRANSLATION_PREFIX . InterviewStatusesEnum::PASSED->value),
            InterviewStatusesEnum::REJECTED => trans(self::TRANSLATION_PREFIX . InterviewStatusesEnum::REJECTED->value),
            InterviewStatusesEnum::ARCHIVED => trans(self::TRANSLATION_PREFIX . InterviewStatusesEnum::ARCHIVED->value),
        };
    }
}
