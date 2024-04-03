<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
//MongoDB\Laravel\Eloquent
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Experiment extends Model
{
    use HasFactory;

    protected $collection = 'experiments';
    protected $connection = 'mongodb';
    protected $fillable = ['name', 'description', 'start_date', 'end_date'];
}
