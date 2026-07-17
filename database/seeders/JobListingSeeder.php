<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = '2026-07-07 05:17:55';

        $countries = DB::table('countries')->pluck('name')->values()->all();
        $currencies = DB::table('currencies')->pluck('code')->values()->all();
        $industries = DB::table('industries')->pluck('name')->values()->all();
        $visaCategories = DB::table('visa_categories')->pluck('name')->values()->all();
        $benefitIds = DB::table('benifits')->pluck('id')->values()->all();
        $userIds = DB::table('users')->pluck('id')->values()->all();
        $existingJobs = DB::table('job_listings')->orderBy('created_at')->get()->map(fn ($job) => (array) $job)->values()->all();

        $countries = empty($countries) ? ['uae'] : $countries;
        $currencies = empty($currencies) ? ['USD'] : $currencies;
        $industries = empty($industries) ? ['cleaning'] : $industries;
        $visaCategories = empty($visaCategories) ? ['job visa'] : $visaCategories;
        $benefitIds = empty($benefitIds) ? [1] : $benefitIds;
        $userIds = empty($userIds) ? [1] : $userIds;

        $fallbackTemplates = [
            [
                'title' => 'cleaning',
                'company' => 'emaraled',
                'location' => 'uae',
                'salary_min' => 30000,
                'salary_max' => 60000,
                'vacancies' => 1,
                'age_min' => 21,
                'age_max' => 45,
                'gender' => 'Both',
                'holidays' => 'Sunday',
                'type' => 'Full-time',
                'work_time' => '8 hours / shift',
                'experience' => 'No experience',
                'contract_period' => '2 years',
                'description' => 'hj',
                'requirements' => '[]',
                'applicants_count' => 0,
                'closing_date' => '2026-07-10 00:00:00',
            ],
            [
                'title' => 'security guard',
                'company' => 'emaraled',
                'location' => 'usa',
                'salary_min' => 28000,
                'salary_max' => 50000,
                'vacancies' => 2,
                'age_min' => 22,
                'age_max' => 40,
                'gender' => 'Both',
                'holidays' => 'Friday',
                'type' => 'Full-time',
                'work_time' => '12 hours / shift',
                'experience' => '1 year',
                'contract_period' => '1 year',
                'description' => 'security position',
                'requirements' => '["Valid ID","Basic English"]',
                'applicants_count' => 0,
                'closing_date' => '2026-08-01 00:00:00',
            ],
            [
                'title' => 'housekeeping',
                'company' => 'emaraled',
                'location' => 'uae',
                'salary_min' => 25000,
                'salary_max' => 45000,
                'vacancies' => 3,
                'age_min' => 20,
                'age_max' => 42,
                'gender' => 'Both',
                'holidays' => 'Sunday',
                'type' => 'Contract',
                'work_time' => '8 hours / shift',
                'experience' => 'No experience',
                'contract_period' => '2 years',
                'description' => 'housekeeping role',
                'requirements' => '["Team work","Willing to relocate"]',
                'applicants_count' => 0,
                'closing_date' => '2026-08-15 00:00:00',
            ],
        ];

        for ($index = 0; $index < 25; $index++) {
            $template = $existingJobs[$index % max(1, count($existingJobs))] ?? $fallbackTemplates[$index % count($fallbackTemplates)];
            $jobId = $existingJobs[$index]['id'] ?? '01KWXG5V182DQ5QYM5S9DPA'.str_pad((string) ($index + 1), 3, '0', STR_PAD_LEFT);
            $country = $countries[$index % count($countries)];
            $currency = $currencies[$index % count($currencies)];
            $industry = $industries[$index % count($industries)];
            $visaCategory = $visaCategories[$index % count($visaCategories)];
            $benefitId = $benefitIds[$index % count($benefitIds)];
            $userId = (int) $userIds[$index % count($userIds)];

            DB::table('job_listings')->updateOrInsert(
                ['id' => $jobId],
                [
                    'title' => ($template['title'] ?? 'job').' '.($index + 1),
                    'company' => $template['company'] ?? 'emaraled',
                    'location' => $country,
                    'country' => $country,
                    'salary_min' => (int) ($template['salary_min'] ?? 25000) + ($index * 500),
                    'salary_max' => (int) ($template['salary_max'] ?? 40000) + ($index * 750),
                    'vacancies' => (int) ($template['vacancies'] ?? 1) + ($index % 3),
                    'age_min' => (int) ($template['age_min'] ?? 20),
                    'age_max' => (int) ($template['age_max'] ?? 45),
                    'gender' => $template['gender'] ?? 'Both',
                    'holidays' => $template['holidays'] ?? 'Sunday',
                    'currency' => $currency,
                    'type' => $template['type'] ?? 'Full-time',
                    'work_time' => $template['work_time'] ?? '8 hours / shift',
                    'industry' => $industry,
                    'experience' => $template['experience'] ?? 'No experience',
                    'visa_category' => $visaCategory,
                    'contract_period' => $template['contract_period'] ?? '1 year',
                    'description' => ($template['description'] ?? 'job listing').' '.$country,
                    'requirements' => $template['requirements'] ?? '[]',
                    'applicants_count' => (int) ($template['applicants_count'] ?? 0),
                    'closing_date' => $template['closing_date'] ?? now()->addDays(30)->toDateTimeString(),
                    'user_id' => $userId,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]
            );

            DB::table('job_benifits')->updateOrInsert(
                [
                    'job_id' => $jobId,
                    'benefit_id' => $benefitId,
                ],
                [
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]
            );
        }
    }
}