<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded =[];

    private $color = [

        'en attente'=>'bg-yellow-500',
        'new'=>'bg-blue-500',
        'en cours'=>'bg-blue-700',
        'terminée'=>'bg-red-500',

    ];

    public function colorStatus() : string
    {
       return $this->color[$this->status];

    }

    protected $fillable= ['name','start_date','due_date','description','user_created_by','user_assigned_to'];   

    public function user()
    {
          $this-> belongsTo(User::class);
    }


    public function isActive()
    {
        $now = Carbon::now();
        $start_date = Carbon::parse($this->start_date);
        $due_date = Carbon::parse($this->due_date);

        return $now->isAfter($start_date) && $now->isBefore($due_date) && !in_array($this->status, ['en cours', 'terminée']);
    }

    public function statusOn()
    {
        return  !in_array($this->status,['en cours', 'terminée','en attente']);
    }
}
