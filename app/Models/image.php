<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function destinations()
    {
        return $this->belongsTo(Destination::class);
    }
}
