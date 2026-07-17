<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Benefit extends Model
{
    /** @use HasFactory<\Database\Factories\BenefitFactory> */
    use HasFactory;

    protected $table = 'benifits';

    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany<JobBenefit, $this>
     */
    public function jobBenefits(): HasMany
    {
        return $this->hasMany(JobBenefit::class);
    }
}
