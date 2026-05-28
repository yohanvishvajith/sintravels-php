<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'company',
        'location',
        'country',
        'salary_min',
        'salary_max',
        'vacancies',
        'age_min',
        'age_max',
        'gender',
        'holidays',
        'currency',
        'type',
        'work_time',
        'industry',
        'experience',
        'visa_category',
        'contract_period',
        'description',
        'requirements',
        'applicants_count',
        'view_count',
        'closing_date',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'requirements' => 'array',
            'closing_date' => 'datetime',
            'salary_min' => 'integer',
            'salary_max' => 'integer',
            'vacancies' => 'integer',
            'age_min' => 'integer',
            'age_max' => 'integer',
            'applicants_count' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Job $job) {
            if (empty($job->id)) {
                $job->id = Str::ulid()->toBase32();
            }
        });
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the country associated with this job
     */
    public function countryData(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country', 'name');
    }

    /**
     * @return HasMany<Applicant, $this>
     */
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }

    /**
     * @return HasMany<JobBenefit, $this>
     */
    public function jobBenefits(): HasMany
    {
        return $this->hasMany(JobBenefit::class);
    }
}
