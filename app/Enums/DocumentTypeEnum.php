<?php

namespace App\Enums;

enum DocumentTypeEnum: string
{
    case Resume = 'resume';
    case ID_CARD = 'id_card';
    case Passport = 'passport';
    case Coverletter = 'cover_letter';
    case Contract = 'contract';
    case LeaveApplication = 'leave_application';
}
