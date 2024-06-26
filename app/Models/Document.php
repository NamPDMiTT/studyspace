<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'documents';
    protected $fillable = [
        'name',
        'thumbnail',
        'file',
        'description',
        'is_featured',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
