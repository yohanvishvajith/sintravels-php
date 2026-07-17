<?php

namespace App\Livewire;

use App\Models\Benefit;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Industry;
use App\Models\Job;
use App\Models\JobBenefit;
use App\Models\VisaCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminJobForm extends Component
{
    public ?string $jobId = null;

    public bool $showModal = false;

    public bool $showAddButton = true;

    public int $currentStep = 1;

    // Step 1 Fields
    public string $jobTitle = '';

    public string $company = '';

    public string $jobType = '';

    public string $country = '';

    public string $industry = '';

    public string $closingDate = '';

    public int $vacancies = 1;

    // Step 2 Fields
    public string $holidays = 'Sunday';

    public string $workingHours = '8 hours / shift';

    public string $visaCategory = '';

    public string $contractPeriod = '2 years';

    public string $gender = 'Both';

    public string $experience = 'No experience';

    public int $minAge = 21;

    public int $maxAge = 45;

    public string $currency = 'QAR';

    public int $salaryMin = 30000;

    public ?int $salaryMax = null;

    public string $description = '';

    /** @var array<int, string> */
    public array $benefits = [];

    /** @var array<int, string> */
    public array $jobTypes = [ 'Part-time','Full-time', 'Contract', 'Temporary'];

    public function openModal(): void
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->jobId = null;
        $this->jobTitle = '';
        $this->company = '';
        $this->jobType = '';
        $this->country = '';
        $this->industry = '';
        $this->closingDate = '';
        $this->vacancies = 1;
        $this->holidays = 'Sunday';
        $this->workingHours = '8 hours / shift';
        $this->visaCategory = '';
        $this->contractPeriod = '2 years';
        $this->gender = 'Both';
        $this->experience = 'No experience';
        $this->minAge = 21;
        $this->maxAge = 45;
        $this->currency = 'QAR';
        $this->salaryMin = 30000;
        $this->salaryMax = null;
        $this->description = '';
        $this->benefits = [];
        $this->currentStep = 1;
    }

    #[On('edit-job')]
    public function editJob(string $id): void
    {
        $this->resetForm();
        $this->jobId = $id;
        $job = Job::with('jobBenefits.benefit')->findOrFail($id);

        $this->jobTitle = $job->title;
        $this->company = $job->company ?? '';
        $this->jobType = $job->type;
        $this->country = $job->country;
        $this->industry = $job->industry ?? '';
        $this->closingDate = $job->closing_date ? $job->closing_date->format('Y-m-d') : '';
        $this->vacancies = $job->vacancies;

        $this->holidays = $job->holidays ?? 'Sunday';
        $this->workingHours = $job->work_time ?? '8 hours / shift';
        $this->visaCategory = $job->visa_category ?? '';
        $this->contractPeriod = $job->contract_period ?? '2 years';
        $this->gender = $job->gender ?? 'Both';
        $this->experience = $job->experience ?? 'No experience';
        $this->minAge = $job->age_min;
        $this->maxAge = $job->age_max;
        $this->currency = $job->currency;
        $this->salaryMin = $job->salary_min;
        $this->salaryMax = $job->salary_max;
        $this->description = $job->description !== 'N/A' ? (string) $job->description : '';
        
        $this->benefits = $job->jobBenefits->filter(fn($jb) => $jb->benefit)->map(fn($jb) => $jb->benefit->name)->toArray();

        $this->currentStep = 1;
        $this->showModal = true;
    }

    public function nextStep(): void
    {
        if ($this->currentStep === 1) {
            $this->validateStep1();
            $this->currentStep = 2;
        } elseif ($this->currentStep === 2) {
            $this->validateStep2();
            $this->currentStep = 3;
        }
    }

    public function previousStep(): void
    {
        if ($this->currentStep === 2) {
            $this->currentStep = 1;
        } elseif ($this->currentStep === 3) {
            $this->currentStep = 2;
        }
    }

    public function validateStep1(): void
    {
        $this->validate([
            'jobTitle' => 'required|string|max:255',
            'company' => 'string|max:255',
            'jobType' => 'required|string',
            'country' => 'required|string',
            'industry' => 'required|string',
            'closingDate' => 'required|date|after_or_equal:today',
            'vacancies' => 'required|integer|min:1',
        ], [
            'closingDate.after_or_equal' => 'The closing date must be today or later.',
        ]);
    }

    public function validateStep2(): void
    {
        $this->validate([
            'holidays' => 'required|string',
            'workingHours' => 'required|string',
            'visaCategory' => 'required|string',
            'contractPeriod' => 'required|string',
            'gender' => 'required|string',
            'experience' => 'required|string',
            'minAge' => 'required|integer|min:1',
            'maxAge' => 'required|integer|min:1',
            'currency' => 'required|string',
            'salaryMin' => 'required|integer|min:0',
            'salaryMax' => 'nullable|integer|min:0',
        ]);
    }

    public function submit(): void
    {
        $this->validate([
            'jobTitle' => 'required|string|max:255',
            'company' => 'string|max:255',
            'jobType' => 'required|string',
            'country' => 'required|string',
            'industry' => 'required|string',
            'closingDate' => 'required|date|after_or_equal:today',
            'vacancies' => 'required|integer|min:1',
            'holidays' => 'required|string',
            'workingHours' => 'required|string',
            'visaCategory' => 'required|string',
            'contractPeriod' => 'required|string',
            'gender' => 'required|string',
            'experience' => 'required|string',
            'minAge' => 'required|integer|min:1',
            'maxAge' => 'required|integer|min:1',
            'currency' => 'required|string',
            'salaryMin' => 'required|integer|min:0',
            'salaryMax' => 'nullable|integer|min:0',
        ], [
            'closingDate.after_or_equal' => 'The closing date must be today or later.',
        ]);

        DB::transaction(function () {
            $data = [
                'title' => $this->jobTitle,
                'company' => $this->company,
                'location' => $this->country,
                'country' => $this->country,
                'salary_min' => $this->salaryMin,
                'salary_max' => $this->salaryMax,
                'vacancies' => $this->vacancies,
                'age_min' => $this->minAge,
                'age_max' => $this->maxAge,
                'gender' => $this->gender,
                'holidays' => $this->holidays,
                'currency' => $this->currency,
                'type' => $this->jobType,
                'work_time' => $this->workingHours,
                'industry' => $this->industry,
                'experience' => $this->experience,
                'visa_category' => $this->visaCategory,
                'contract_period' => $this->contractPeriod,
                'description' => $this->description ?: 'N/A',
                'closing_date' => $this->closingDate,
            ];

            if ($this->jobId) {
                $job = Job::query()->findOrFail($this->jobId);
                $job->update($data);
                
                // Clear old benefits
                JobBenefit::query()->where('job_id', $job->id)->delete();
            } else {
                $data['requirements'] = [];
                $data['user_id'] = Auth::id();
                $job = Job::query()->create($data);
            }

            foreach ($this->benefits as $benefitName) {
                $benefit = Benefit::query()->firstOrCreate(['name' => $benefitName]);
                JobBenefit::query()->create([
                    'job_id' => $job->id,
                    'benefit_id' => $benefit->id,
                ]);
            }
        });

        $message = $this->jobId ? 'Job updated successfully!' : 'Job created successfully!';
        session()->flash('success', $message);
        $this->dispatch('toast', type: 'success', message: $message, position: 'top-right');
        $this->closeModal();
        $this->dispatch('job-created');
    }

    public function render()
    {
        $countries = Country::query()->pluck('name')->toArray();
        $industries = Industry::query()->pluck('name')->toArray();
        $benefitOptions = Benefit::query()->pluck('name')->toArray();
        $currencies = Currency::query()->pluck('code')->toArray();
        $visaCategories = VisaCategory::query()->pluck('name')->toArray();

        // Fallback to defaults if tables are empty
        if (empty($countries)) {
            $countries = ['UAE', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Bahrain', 'Oman', 'Singapore', 'Thailand', 'Malaysia'];
        }
        if (empty($industries)) {
            $industries = ['IT', 'Healthcare', 'Finance', 'Hospitality', 'Engineering', 'Education', 'Retail', 'Manufacturing'];
        }
        if (empty($benefitOptions)) {
            $benefitOptions = ['Free Medical', 'Free Transport', 'Free Uniform', 'Housing', 'Food Allowance', 'Travel Allowance'];
        }
        if (empty($currencies)) {
            $currencies = ['QAR', 'AED', 'SAR', 'KWD', 'BHD', 'OMR', 'SGD', 'THB', 'MYR'];
        }
        if (empty($visaCategories)) {
            $visaCategories = ['Job Visa', 'Dependent Visa', 'Investor Visa', 'Freelance Visa'];
        }

        return view('livewire.admin-job-form', [
            'countries' => $countries,
            'industries' => $industries,
            'benefitOptions' => $benefitOptions,
            'currencies' => $currencies,
            'visaCategories' => $visaCategories,
        ]);
    }
}
