<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'departureDate',
        'arrivalDate',
        'imagename',
        'country',
        'city',
    ];
    
    protected $hidden = ['created_at', 'updated_at'];
    
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
       return $this->belongsTo(Category::class, 'category_id');
    }

    public function join()
    {
       return $this->hasMany(join::class);
    }

}
