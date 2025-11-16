<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tasks; 

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['title', 
                            'description', 
                            'status', 
                            'category_id']; // Mass assignment protection
    // Belongs-to relationship
    public function category()
    {
    return $this->belongsTo(Category::class);
}
}
