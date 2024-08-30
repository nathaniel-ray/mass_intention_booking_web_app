<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];
    protected $appends = ['src'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSrcAttribute()
    {
        return asset("storage/{$this->filename}"); // assuming you're using Laravel's asset helper
    }
}
