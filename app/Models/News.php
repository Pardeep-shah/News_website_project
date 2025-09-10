<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'news_heading',
        'news_header_image',
        'short_description',
        'news_large_description',
        'images',          // multiple images (JSON or comma separated)
        'news_link',       // external/internal link
        'published_by',    // name of publisher
        'content',
        'category',        // e.g. politics, sports, tech
        'tags',            // comma separated tags
        'status',          // draft / published
        'published_at',    // when news goes live
        'views_count',     // track readers
    ];

    protected $casts = [
        'images' => 'array',        // if you store images as JSON
        'published_at' => 'datetime',
    ];

    // Relation: News belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
