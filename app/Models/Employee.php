<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'position_id',
        'hire_date',
        'status',
        'address',
        'emergency_contact',
        'bank_info',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
