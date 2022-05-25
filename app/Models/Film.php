<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'running_time',
        'category_id',
        'synopsis'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function actors() {
        return $this->belongsToMany(Actor::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
