<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Industry;
use App\Models\VisaCategory;
use App\Models\Benefit;
use App\Models\JobBenefit;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $countries = Country::pluck('name')->toArray();
        $currencies = Currency::pluck('code')->toArray();
        $industries = Industry::pluck('name')->toArray();
        $visaCategories = VisaCategory::pluck('name')->toArray();
        $benefitIds = Benefit::pluck('id')->toArray();

        // Ensure there is at least one value for each foreign table
        if (empty($countries)) {
            $countries = [Country::create(['name' => 'USA'])->name];
        }
        if (empty($currencies)) {
            $currencies = [Currency::create(['code' => 'USD', 'name' => 'United State Dollar'])->code];
        }
        if (empty($industries)) {
            $industries = [Industry::create(['name' => 'Cleaning'])->name];
        }
        if (empty($visaCategories)) {
            $visaCategories = [VisaCategory::create(['name' => 'Visit visa'])->name];
        }
        if (empty($benefitIds)) {
            $benefitIds = [Benefit::create(['name' => 'Default Benefit'])->id];
        }

        for ($i = 0; $i < 25; $i++) {
            $ageMin = $faker->numberBetween(18, 30);
            $ageMax = $faker->numberBetween($ageMin + 1, 60);
            $salaryMin = $faker->numberBetween(300, 50000);
            $salaryMax = $salaryMin + $faker->numberBetween(0, 30000);

            $job = Job::create([
                'title' => $faker->jobTitle(),
                'company' => $faker->company(),
                'location' => $faker->city(),
                'country' => $faker->randomElement($countries),
                'salary_min' => $salaryMin,
                'salary_max' => $salaryMax,
                'vacancies' => $faker->numberBetween(1, 10),
                'age_min' => $ageMin,
                'age_max' => $ageMax,
                'gender' => $faker->randomElement([null, 'Male', 'Female', 'Any']),
                'holidays' => $faker->randomElement(['sunday', 'friday', 'saturday']),
                'currency' => $faker->randomElement($currencies),
                'type' => $faker->randomElement(['Contract', 'Permanent', 'Temporary']),
                'work_time' => $faker->randomElement([null, '40 hours/week', '8 hours/day']),
                'industry' => $faker->randomElement($industries),
                'experience' => $faker->randomElement([null, '1 year', '2 years', '3 years', '5+ years']),
                'visa_category' => $faker->randomElement($visaCategories),
                'contract_period' => $faker->randomElement([null, '6 months', '1 year', '2 years']),
                'description' => $faker->paragraphs(3, true),
                'requirements' => json_encode([
                    $faker->randomElement(['Bachelor\'s degree', 'High school diploma', 'No formal education required']),
                    $faker->randomElement(['1+ years experience', '3+ years experience', '5+ years experience']),
                ]),
                'applicants_count' => 0,
                'closing_date' => now()->addDays($faker->numberBetween(10, 90)),
            ]);

            // Attach 1-3 random benefits
            $attach = $faker->randomElements($benefitIds, $faker->numberBetween(1, min(3, count($benefitIds))));
            foreach ($attach as $bid) {
                JobBenefit::create([
                    'job_id' => $job->id,
                    'benefit_id' => $bid,
                ]);
            }
        }
    }
}
