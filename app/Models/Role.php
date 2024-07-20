<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    private $color = [
      'admin'=>'bg-blue-500',
      'create'=>'bg-green-500',
      'users'=>'bg-red-500',

    ];

    public function colorRoles():string
    {
        return $this->color[$this->name];
    }

    
}
