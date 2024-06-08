<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    // allow bulk assignment
    protected $guarded = ['id'];

    // allow only given attributes to be filled
    protected $fillable = ['name', 'email', 'message'];
}
