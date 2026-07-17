<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'flagimg',
    ];

    /**
     * Get active jobs for this country
     */
    public function activeJobs(): HasMany
    {
        return $this->hasMany(Job::class, 'country', 'name')
            ->where('closing_date', '>', now());
    }
}
