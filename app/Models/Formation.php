<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Formation extends Model
{
    use HasFactory;
    protected $collection = 'formations';
    protected $connection = 'mongodb';
    protected $fillable = ['title', 'description', 'location', 'date'];
}
