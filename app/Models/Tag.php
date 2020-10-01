<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'text'
    ];

    public function expressions()
    {
        return $this->belongsToMany(Expression::class);
    }
}
