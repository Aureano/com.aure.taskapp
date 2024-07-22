<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Task;
use App\Models\Service;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'service_id'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function isCreate()
    {
        return $this->roles()->where('name','create')->exists();
    }

    public function isAdmin()
    {
        return $this->roles()->where('name','admin')->exists();
    }

    public function manyRoles(array $roles)
    {
        return $this->roles()->whereIn('name',$roles)->exists();
    }

    public function assign_task()
    {
        return $this->hasMany(Task::class,'user_created_by');
    }

    public function assigned_task()
    {
        return $this->hasMany(Task::class,'user_assigned_to');
    }
}
