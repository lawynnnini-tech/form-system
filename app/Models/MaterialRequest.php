<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $guarded = [];

    protected $casts = [
        'department' => 'array',
        'items' => 'array',
        'purpose' => 'array',
        'signatures' => 'array',
    ];
}