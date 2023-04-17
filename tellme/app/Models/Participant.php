<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['room_id', 'user_id'];
    protected $table = 'participants';
}
