<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestJobs extends Model
{
    /** @use HasFactory<\Database\Factories\TestJobsFactory> */
    use HasFactory;

    protected $table = 'testjobs';

    protected $fillable = [
        'title',
        'country',
        'visa_category',
        'contract_period',
        'type',
        'company',
        'location',
        'age_min',
        'age_max',
        'gender',
        'work_time',
        'holidays',
        'currency',
        'salary_min',
        'salary_max',
        'requirements',
        'benefits',
        'description',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
    ];
}
