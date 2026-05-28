<div style="margin-bottom: 1rem;">
    @if ($showAddButton)
        <button class="btn btn-primary mb-3" wire:click="openModal">
        <i class="fas fa-plus"></i>
        Add New Job
    </button>
    @endif
 
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="modal-overlay" @if ($showModal) style="display: flex;" @endif id="jobFormModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ $jobId ? 'Edit Job' : 'Add New Job' }}</h3>
                <button type="button" class="modal-close" wire:click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form wire:submit="submit" class="modal-form">
                @if ($currentStep === 1)
                <div class="form-step">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="jobTitle">Job Title<span class="required">*</span></label>
                            <input type="text" id="jobTitle" wire:model="jobTitle" class="form-input"
                                placeholder="e.g. Senior Developer">
                            @error('jobTitle') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" id="company" wire:model="company" class="form-input"
                                placeholder="Company name">
                            @error('company') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="jobType">Job Type<span class="required">*</span></label>
                            <select id="jobType" wire:model="jobType" class="form-input">
                                <option value="">Select Job Type</option>
                                @foreach ($jobTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('jobType') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="country">Country<span class="required">*</span></label>
                            <select id="country" wire:model="country" class="form-input">
                                <option value="">Select Country</option>
                                @foreach ($countries as $cnt)
                                <option value="{{ $cnt }}">{{ $cnt }}</option>
                                @endforeach
                            </select>
                            @error('country') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="industry">Industry<span class="required">*</span></label>
                            <select id="industry" wire:model="industry" class="form-input">
                                <option value="">Select Industry</option>
                                @foreach ($industries as $ind)
                                <option value="{{ $ind }}">{{ $ind }}</option>
                                @endforeach
                            </select>
                            @error('industry') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="closingDate">Closing Date<span class="required">*</span></label>
                            <input type="date" id="closingDate" wire:model="closingDate" class="form-input">
                            @error('closingDate') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="vacancies">Vacancies<span class="required">*</span></label>
                            <input type="number" id="vacancies" wire:model="vacancies" class="form-input"
                                placeholder="e.g. 1" min="1">
                            @error('vacancies') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="visaCategory">Visa Category<span class="required">*</span></label>
                            <select id="visaCategory" wire:model="visaCategory" class="form-input">
                                <option value="">Select Visa Category</option>
                                @foreach ($visaCategories as $visa)
                                <option value="{{ $visa }}">{{ $visa }}</option>
                                @endforeach
                            </select>
                            @error('visaCategory') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                @if ($currentStep === 2)
                <div class="form-step">


                    <div class="form-row">
                        <div class="form-group">
                            <label for="holidays">Holidays</label>
                            <select id="holidays" wire:model="holidays" class="form-input">
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Weekend">Weekend</option>
                                <option value="Negotiable">Negotiable</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="workingHours">Working Hours</label>
                            <input type="text" id="workingHours" wire:model="workingHours" class="form-input"
                                placeholder="e.g. 8 hours / shift">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="contractPeriod">Contract Period</label>
                            <select id="contractPeriod" wire:model="contractPeriod" class="form-input">
                                <option value="">Select Contract Period</option>
                                <option value="1 year">1 year</option>
                                <option value="2 years">2 years</option>
                                <option value="3 years">3 years</option>
                                <option value="4 years">4 years</option>
                                <option value="5 years">5 years</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" wire:model="gender" class="form-input">
                                <option value="Both">Both</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="minAge">Min Age</label>
                            <input type="number" id="minAge" wire:model="minAge" class="form-input" min="1">
                            @error('minAge') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="maxAge">Max Age</label>
                            <input type="number" id="maxAge" wire:model="maxAge" class="form-input" min="1">
                            @error('maxAge') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <select id="experience" wire:model="experience" class="form-input">
                                <option value="">Select Experience</option>
                                <option value="No Experience">No Experience</option>
                                <option value="1 year">1+ year</option>
                                <option value="2 years">2+ years</option>
                                <option value="3 years">3+ years</option>
                                <option value="4 years">4+ years</option>
                                <option value="5 years+">5+ years</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select id="currency" wire:model="currency" class="form-input">
                                @foreach ($currencies as $curr)
                                <option value="{{ $curr }}">{{ $curr }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="form-group">
                            <label for="salaryMin">Salary Min<span class="required">*</span></label>
                            <input type="number" id="salaryMin" wire:model="salaryMin" class="form-input"
                                placeholder="e.g. 30000" min="0">
                            @error('salaryMin') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="salaryMax">Salary Max</label>
                            <input type="number" id="salaryMax" wire:model="salaryMax" class="form-input"
                                placeholder="e.g. 60000" min="0">
                            @error('salaryMax') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                @if ($currentStep === 3)
                <div class="form-step">

                    <label for="benefits">Available Benefits</label>
                    <div class="benefits-grid">
                        @foreach ($benefitOptions as $benefit)
                        <label class="checkbox-group">
                            <input type="checkbox" wire:model="benefits" value="{{ $benefit }}">

                            {{ $benefit }}
                        </label>
                        @endforeach
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" wire:model="description" class="form-input" rows="5" placeholder="Job description and details"></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">
                        Close
                    </button>
                    @if ($currentStep > 1)
                    <button type="button" class="btn btn-secondary" wire:click="previousStep">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    @endif

                    @if ($currentStep < 3)
                        <button type="button" class="btn btn-primary" wire:click="nextStep">
                        Next <i class="fas fa-arrow-right"></i>
                        </button>
                        @else
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> {{ $jobId ? 'Update Job' : 'Publish Job' }}
                        </button>
                        @endif


                </div>
            </form>
        </div>
    </div>
</div>