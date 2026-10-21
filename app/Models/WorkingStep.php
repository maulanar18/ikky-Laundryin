<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingStep extends Model
{
    use HasFactory;

    protected $table = 'working_steps';

    protected $fillable = [
        'title',
        'description',
        'order',
    ];
}
