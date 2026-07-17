<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobBenefit extends Model
{
    protected $table = 'job_benifits';

    protected $fillable = [
        'job_id',
        'benefit_id',
    ];

    /**
     * @return BelongsTo<Job, $this>
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * @return BelongsTo<Benefit, $this>
     */
    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefit::class);
    }
}
