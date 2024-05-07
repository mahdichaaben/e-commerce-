<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', 'slug',
        'description', 'price', 'discount_price','status' ,'category_id', 'user_id',
    ];
    protected $table = 'products';


    public  function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function useradmin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeFilter($query,$filters){

        
        $query->where('name' ,'like','%'.request('keywords').'%');





    }



}
