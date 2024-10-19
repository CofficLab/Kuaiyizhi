<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Advice extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['contract', 'content', 'name'];

    protected $table = 'advices';
}
