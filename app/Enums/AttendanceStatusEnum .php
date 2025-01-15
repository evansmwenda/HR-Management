<?php

namespace App\Enums;

enum AttendanceStatusEnum: string
{
    case Present = 'present';
    case Absent = 'absent';
    case Late = 'late';
    case EarlyLeave = 'early_leave';
    case SickLeave = 'sick_leave';
}
