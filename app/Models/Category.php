<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image', 'parent_id','level'];
    protected $table = 'categories';

//     public function scopeFilter($query,array $filters){
//         $query->where(fn($query)=>$query->when($filters['search']??false,function ($query,$search){
//             $query
//             ->where('name','like','%'.$search.'%');
//         }));
// }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}

