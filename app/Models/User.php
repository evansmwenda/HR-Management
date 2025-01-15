<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
       'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => trim("{$this->first_name} {$this->last_name}"),
        );
    }

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function canAccessFilament(): bool
    {
        return true; // Add your authorization logic here
    }

    public function canAccessPanel(Panel $panel = null): bool
    {
        return true;
    }
}
