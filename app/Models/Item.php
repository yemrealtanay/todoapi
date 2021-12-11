<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dates(): array
    {
        return ['created_at', 'updated_at'];
    }

    protected $casts = [
        'created_at' => 'date:H:i',
        'updated_at' => 'date:H:i',
    ];

}
