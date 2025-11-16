<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; 

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Mass assignment protection
    //protected $guarded = ['id'];

    // One-to-many relationship
    public function tasks()
    {
    return $this->hasMany(Task::class);
}
}
