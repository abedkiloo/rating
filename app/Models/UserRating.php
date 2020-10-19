<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{

    protected $table = 'rating';
    protected $fillable = [
        'user_id', 'user_rated_id', 'rating_score', 'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function user_rating()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
            ->select(['id', 'name',]);
    }

    public function rated_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
            ->select(['id', 'name']);
    }
}
