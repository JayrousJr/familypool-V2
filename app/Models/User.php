<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Shetabit\Visitor\Traits\Visitor;
use Laravel\Jetstream\HasProfilePhoto;
use Shetabit\Visitor\Traits\Visitable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, SoftDeletes;
    use HasRoles;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Visitable;
    use Visitor;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'team_member',
        'profile_photo_path',
        'role',
        '',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }
    public function serviceAssignment()
    {
        return $this->hasMany(ServiceRequest::class, "user_id", "id");
    }
    public function clients()
    {
        return $this->hasMany(Client::class, 'user_id', 'id');
    }
    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'client_id', 'id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // return true;
        return $this->hasRole(['Manager', 'Technician', 'Administrator']);
    }

    public function isIT(): bool
    {
        return $this->hasRole(['Administrator']);
    }
    public function isTechnician(): bool
    {
        return $this->hasRole(['Technician']);
    }
    public function isManager(): bool
    {
        return $this->hasRole(['Manager', 'Administrator']);
    }
}
