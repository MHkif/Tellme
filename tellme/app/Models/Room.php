<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Request;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function launcher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function paricipants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'participants', 'room_id', 'user_id');
    }




    public function isMember(): Attribute
    {
        return new Attribute(function () {
            return $this->paricipants()->where('user_id', auth()->user()->id)->exists();
        });
    }
}
