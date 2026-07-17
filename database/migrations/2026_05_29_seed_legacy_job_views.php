<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Populate job_views from legacy data
        // This recreates the view records for jobs that previously had view counts
        $jobId = '01KSACZ3J3HMD5XQTE307G2HET';
        $viewCount = 3;
        $createdAt = now();

        if (! DB::table('job_listings')->where('id', $jobId)->exists()) {
            return;
        }

        for ($i = 0; $i < $viewCount; $i++) {
            DB::table('job_views')->insert([
                'job_id' => $jobId,
                'created_at' => $createdAt->copy()->subMinutes($viewCount - $i),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Delete the seeded view records
        DB::table('job_views')->truncate();
    }
};
