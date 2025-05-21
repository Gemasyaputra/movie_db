<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

   public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}

protected $fillable = [
    'title',
    'cover_image',
    'synopsis',
    'year',
    'actors',
    'category_id',
];

protected static function booted()
{
    static::creating(function ($movie) {
        $movie->slug = \Str::slug($movie->title);
    });
}

public function getCoverImageUrlAttribute()
    {
        return Str::startsWith($this->cover_image, 'http')
            ? $this->cover_image
            : asset('images/' . $this->cover_image);
    }

}
