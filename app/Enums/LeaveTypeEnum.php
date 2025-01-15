<?php

namespace App\Enums;

enum LeaveTypeEnum: string
{
    case PaternalLeave = 'paternal_leave';
    case MaternalLeave = 'maternal_leave';
    case SickLeave = 'sick_leave';
}
