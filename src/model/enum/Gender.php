<?php

declare(strict_types=1);

namespace model\enum;

enum Gender: string
{
    case MALE = 'MALE';
    case FEMALE = 'FEMALE';
}