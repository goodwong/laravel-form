<?php

namespace Goodwong\LaravelForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    /**
     * table name
     */
    protected $table = 'forms';

    /**
     * fillable fields
     */
    protected $fillable = [
        'category_id',
        'name',
        'settings',
        'status',
        'start_at',
        'end_at',
    ];
    
    /**
     * date
     */
    protected $dates = [
        'status',
        'start_at',
        'deleted_at',
    ];

    /**
     * cast attributes
     */
    protected $casts = [
        'settings' => 'object',
    ];
}
