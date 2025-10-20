<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'name', 'email', 'phone', 'message', 'contact_method'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}