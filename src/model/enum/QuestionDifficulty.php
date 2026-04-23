<?php

declare(strict_types=1);

namespace model\enum;

enum QuestionDifficulty: string
{
    case HARD = 'HARD';
    case MEDIUM = 'MEDIUM';
    case BASIC = 'BASIC';
}