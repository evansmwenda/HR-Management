<?php

use App\Models\User;
use App\Models\Employee;
use App\Enums\LeaveTypeEnum;
use App\Enums\LeaveStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class)->constrained();
            $table->string('leave_type')->default(LeaveTypeEnum::SickLeave->value);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_status')->default(LeaveStatusEnum::Pending->value);
            $table->text('reason')->nullable();
            $table->foreignId('approvied_by')->constrained('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
