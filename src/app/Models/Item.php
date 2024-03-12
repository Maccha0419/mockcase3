<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'condition_id',
        'name',
        'brand',
        'img_url',
        'price',
        'description'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category_items()
    {
        return $this->hasMany(CategoryItem::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function sold_items()
    {
        return $this->hasMany(SoldItem::class);
    }
    public function scopeKeywordItemSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('brand', 'like', '%' . $keyword . '%');
        }
    }
}
