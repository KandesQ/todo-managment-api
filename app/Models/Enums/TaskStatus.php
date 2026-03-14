<?php

namespace App\Models\Enums;

enum TaskStatus: int {
    case IN_PROGRESS = 0;
    case DONE = 1;
}