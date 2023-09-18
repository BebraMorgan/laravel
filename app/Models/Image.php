<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
class Image extends Model
{
    use HasFactory;
    use Searchable;


    protected $fillable = ['title', 'image', 'user_id', 'hashtags'];

    protected $guarded = false;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
