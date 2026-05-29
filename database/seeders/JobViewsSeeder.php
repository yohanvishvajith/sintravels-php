<?php

namespace Database\Seeders;

use App\Models\JobView;
use Illuminate\Database\Seeder;

class JobViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Job IDs
        $jobIds = [
            '01KQDB3081Y1GEZAMAPM5PP790',  // cleaning
            '01KS8ASXPP39G3Z76JJEHNG9JK',  // cleanin
            '01KSACZ3J3HMD5XQTE307G2HET',  // Dev (already has 4 views)
        ];

        // Generate dummy data for the last 30 days
        for ($days = 30; $days >= 0; $days--) {
            $date = now()->subDays($days);

            foreach ($jobIds as $jobId) {
                // Random number of views per job per day (0-8)
                $viewsCount = rand(0, 8);

                for ($i = 0; $i < $viewsCount; $i++) {
                    JobView::create([
                        'job_id' => $jobId,
                        'created_at' => $date->clone()->addMinutes(rand(0, 1439)),
                    ]);
                }
            }
        }

        $this->command->info('JobViews seeder completed!');
    }
}
