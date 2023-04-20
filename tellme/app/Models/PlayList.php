<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'podcast_id'];

    protected $table = 'playlists';
}
