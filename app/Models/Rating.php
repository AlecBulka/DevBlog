<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'rating'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public static function avg($post) {
        $avg = 0;
        if($post->ratings->count() != 0) {
            foreach($post->ratings as $rating) {
                $avg += $rating->rating;
            }
            $avg = $avg / $post->ratings->count();
        }
        return round($avg, 1);
    }
}
