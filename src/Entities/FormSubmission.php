<?php

namespace Goodwong\LaravelForm\Entities;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    /**
     * table name
     */
    protected $table = 'form_submissions';

    /**
     * fillable fields
     */
    protected $fillable = [
        'form_id',
        'user_id',
        'data',
    ];
    
    /**
     * date
     */
    protected $dates = [
    ];

    /**
     * cast attributes
     */
    protected $casts = [
        'data' => 'object',
    ];
}
