<div class="min-h-screen flex lg:items-center justify-center bg-gradient-to-br from-[#fff200] via-yellow-100 to-white overflow-hidden" x-data="{
        step: 1,
        totalSteps: 3,
        loading: false,
    }"
>
    <div class="container-sm mx-auto xl:mx-[200px] flex lg:flex-row flex-col flex-wrap items-stretch justify-center min-h-[600px] w-full bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg transition-all duration-300 relative">
        
        <!-- Left Panel with Enhanced Visual Storytelling -->
        <div class="lg:w-1/2 w-full relative overflow-hidden rounded-l-3xl hidden lg:block group perspective-1000">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-transparent z-10 transition-opacity duration-500 group-hover:opacity-50"></div>
            <img 
                src="{{ asset('storage/images/hilux-img.webp') }}" 
                alt="Toyota Hilux"
                class="w-full h-full object-cover object-center transform transition-all duration-700 group-hover:scale-110"
                loading="eager"
            >
            <!-- Enhanced Content Overlay -->
            <div class="absolute inset-0 z-20 flex flex-col justify-end p-10">
                <div class="space-y-6 transform transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                    <!-- Step Indicators -->
                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="h-1.5 rounded-full transition-all duration-300 bg-white/30"
                                
                                }"
                            ></div>
                        @endfor
                    </div>

                    <!-- Dynamic Content Based on Step -->
                    <div class="space-y-4">
                        <span class="inline-flex items-center px-3 py-1 text-xs font-medium bg-yellow-400/90 text-black rounded-full backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- SVG Path -->
                            </svg>
                            <span x-text="{
                                1: 'Security Setup'
                                2: 'Security Setup'
                                3: 'Security Setup'
                            }[step]"></span>
                        </span>
                        <h2 class="text-4xl font-bold text-white" x-text="{
                            1: 'Let\'s Get Started',
                            2: 'Your Workplace',
                            3: 'Secure Your Account'
                        }[step]"></h2>
                        <p class="text-white/90 leading-relaxed" x-text="{
                            1: 'Tell us a bit about yourself to get started with booking.',
                            2: 'Help us understand your role in the organization.',
                            3: 'Create a strong password to protect your account.'
                        }[step]"></p>
                    </div>

                    <!-- Social Proof -->
                    <div class="flex items-center gap-4 pt-4">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white transform transition-transform hover:scale-110 hover:z-10" src="https://i.pravatar.cc/100?img=1" alt="User">
                            <img class="w-8 h-8 rounded-full border-2 border-white transform transition-transform hover:scale-110 hover:z-10" src="https://i.pravatar.cc/100?img=2" alt="User">
                            <img class="w-8 h-8 rounded-full border-2 border-white transform transition-transform hover:scale-110 hover:z-10" src="https://i.pravatar.cc/100?img=3" alt="User">
                        </div>
                        <span class="text-sm text-white/80">Join 2,000+ happy customers</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Right Panel -->
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center p-8 lg:p-12 xl:p-16">
            <!-- Animated Header -->
            <div class="text-center space-y-4 mb-12 relative">
                <div class="inline-block p-4 bg-yellow-100 rounded-2xl mb-6 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-200 to-yellow-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <lord-icon
                        src="https://cdn.lordicon.com/mebvgwrs.json"
                        trigger="loop"
                        stroke="bold"
                        colors="primary:#121331,secondary:#c67d53,tertiary:#fff200,quaternary:#000000,quinary:#ebe6ef"
                        class="w-20 h-20 transform group-hover:scale-110 transition-transform relative z-10"
                    ></lord-icon>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-black via-gray-700 to-yellow-600 bg-clip-text text-transparent">
                    Create Your Account
                </h1>
                <p class="text-gray-600">Join us and start your journey with exceptional services.</p>
            </div>

            <!-- Enhanced Progress Bar -->
            <div class="w-full max-w-md mb-8">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700" x-text="`Step ${step} of ${totalSteps}`"></span>
                    <span class="text-sm text-gray-500" x-text="`${Math.round((step/totalSteps) * 100)}% Complete`"></span>
                </div>
                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-yellow-400 transition-all duration-700 ease-out-expo"
                         :style="`width: ${(step/totalSteps) * 100}%`"></div>
                </div>
            </div>

            <!-- Form Steps with Enhanced Transitions -->
            <form wire:submit.prevent="register" class="w-full max-w-md space-y-6" x-data="{
                    formValid: false,
                    showPassword: false,
                    formData: {
                        first_name: '',
                        other_names: '',
                        work_email: '',
                        mobile_number: '',
                        gender: '',
                        designation: '',
                        department_id: '',
                        directorate_id: '',
                        branch_id: '',
                        password: '',
                        password_confirmation: ''
                    },
                    get passwordValid() {
                        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                        return passwordRegex.test(this.formData.password);
                    },
                    get passwordStrength() {
                        let strength = 0;
                        if (this.formData.password.length >= 8) strength++;
                        if (/[A-Z]/.test(this.formData.password)) strength++;
                        if (/\d/.test(this.formData.password)) strength++;
                        if (/[!@#$%^&*]/.test(this.formData.password)) strength++;
                        return strength;
                    },
                    checkFormValidity() {
                        if (this.step === 1) {
                            this.formValid = this.formData.first_name.length > 1 &&
                                            this.formData.other_names.length > 1 &&
                                            this.formData.work_email.includes('@') &&
                                            /^[0-9]{10}$/.test(this.formData.mobile_number) &&
                                            this.formData.mobile_number.startsWith('07');
                        } else if (this.step === 2) {
                            this.formValid = this.formData.gender !== '' &&
                                            this.formData.designation.length > 1 &&
                                            this.formData.department_id !== '' &&
                                            this.formData.directorate_id !== '' &&
                                            this.formData.branch_id !== '';
                        } else if (this.step === 3) {
                            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; // Regex for password (8 chars, 1 number, 1 uppercase, 1 special)
                            this.formValid = passwordRegex.test(this.formData.password) &&
                                            this.formData.password === this.formData.password_confirmation;
                        }
                    }
                }"
                x-init="checkFormValidity"
            >
                <div class="relative" x-cloak>
                    <!-- Step 1: Personal Information -->
                    <div x-show="step === 1"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-4"
                         class="space-y-6">
                        
                        <!-- First Name -->
                        <div class="space-y-2 relative group">
                            <label for="first_name" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                First Name
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="first_name"
                                    wire:model.lazy="formData.first_name"
                                    x-model="formData.first_name"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{'border-green-400': formData.first_name.length > 1, 'border-red-400': formData.first_name.length === 1}"
                                    placeholder="Your First Name"
                                    required
                                >
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                     :class="{ 'opacity-100': formData.first_name.length > 0, 'opacity-0': formData.first_name.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" :class="{'text-green-500': formData.first_name.length > 1, 'text-red-500': formData.first_name.length === 1}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Other Names -->
                        <div class="space-y-2 relative group">
                            <label for="other_names" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Other Names
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="other_names"
                                    wire:model.lazy="formData.other_names"
                                    x-model="formData.other_names"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{'border-green-400': formData.other_names.length > 1, 'border-red-400': formData.other_names.length === 1}"
                                    placeholder="Your Other Names"
                                    required
                                >
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.other_names.length > 0, 'opacity-0': formData.other_names.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" :class="{'text-green-500': formData.other_names.length > 1, 'text-red-500': formData.other_names.length === 1}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- KeNHA Work Email -->
                        {{-- <div class="space-y-2 relative group">
                            <label for="work_email" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                Work Email
                            </label>
                            <div class="relative">
                                <input 
                                    type="email" 
                                    id="work_email"
                                    wire:model.lazy="formData.work_email"
                                    x-model="formData.work_email"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-green-400': /^[^\s@]+@kenha\.co\.ke$/.test(formData.work_email),
                                        'border-red-400': formData.work_email.length > 0 && !/^[^\s@]+@kenha\.co\.ke$/.test(formData.work_email)
                                    }"
                                    placeholder="j.doe@kenha.co.ke"
                                    required
                                >
                                <!-- Enhanced Visual Feedback -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                     :class="{ 'opacity-100': formData.work_email.length > 0, 'opacity-0': formData.work_email.length === 0 }">
                                    <svg class="w-5 h-5" :class="{'text-green-500': /^[^\s@]+@kenha\.co\.ke$/.test(formData.work_email), 'text-red-500': formData.work_email.length > 0 && !/^[^\s@]+@kenha\.co\.ke$/.test(formData.work_email)}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Normal Email For testing-->
                        <div class="space-y-2 relative group">
                            <label for="work_email" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                Work Email
                            </label>
                            <div class="relative">
                                <input 
                                    type="email" 
                                    id="work_email"
                                    wire:model.lazy="formData.work_email"
                                    x-model="formData.work_email"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{'border-green-400': formData.work_email.length > 0 && formData.work_email.includes('@'), 'border-red-400': formData.work_email.length > 0 && !formData.work_email.includes('@')}"
                                    placeholder="j.doe@kenha.co.ke"
                                    required
                                >
                                <!-- Enhanced Visual Feedback -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                     :class="{ 'opacity-100': formData.work_email.length > 0, 'opacity-0': formData.work_email.length === 0 }">
                                    <svg class="w-5 h-5" :class="{'text-green-500': formData.work_email.includes('@'), 'text-red-500': formData.work_email.length > 0 && !formData.work_email.includes('@')}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="space-y-2 relative group">
                            <label for="mobile_number" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 5a2 2 0 012-2h4a2 2 0 012 2v1a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
                                    <path d="M2 14a2 2 0 012-2h4a2 2 0 012 2v1a2 2 0 01-2 2H4a2 2 0 01-2-2v-1z"></path>
                                </svg>
                                Mobile Number
                            </label>
                            <div class="relative">
                                <input 
                                    type="tel" 
                                    id="mobile_number"
                                    wire:model.lazy="formData.mobile_number"
                                    x-model="formData.mobile_number"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-green-400': /^[0-9]{10}$/.test(formData.mobile_number) && formData.mobile_number.startsWith('07') && formData.mobile_number.length === 10,
                                        'border-red-400': formData.mobile_number.length > 0 && (!/^[0-9]{10}$/.test(formData.mobile_number) || !formData.mobile_number.startsWith('07'))
                                    }"
                                    placeholder="e.g., 0712345678"
                                    required
                                >
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                     :class="{ 'opacity-100': formData.mobile_number.length > 0, 'opacity-0': formData.mobile_number.length === 0 }">
                                     <svg class="w-5 h-5" :class="{'text-green-500': /^[0-9]{10}$/.test(formData.mobile_number) && formData.mobile_number.startsWith('07'), 'text-red-500': formData.mobile_number.length > 0 && (!/^[0-9]{10}$/.test(formData.mobile_number) || !formData.mobile_number.startsWith('07'))}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Organization Details -->
                    <div x-show="step === 2"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-4"
                         class="space-y-6">
                        
                        <!-- Gender -->
                        <div class="space-y-2 relative group">
                            <label for="gender" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Gender
                            </label>
                            <div class="relative">
                                <select 
                                    id="gender"
                                    wire:model.lazy="formData.gender"
                                    x-model="formData.gender"
                                    @change="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    required
                                >
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-5 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.gender.length > 0, 'opacity-0': formData.gender.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="space-y-2 relative group">
                            <label for="designation" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Designation
                            </label>
                            <div class="relative">
                                <input 
                                type="text" 
                                id="designation"
                                wire:model.lazy="formData.designation"
                                x-model="formData.designation"
                                @input="checkFormValidity"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                :class="{'border-green-400': formData.designation.length > 1, 'border-red-400': formData.designation.length === 1}"
                                placeholder="Your Designation"
                                required
                                >
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.designation.length > 0, 'opacity-0': formData.designation.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" :class="{'text-green-500': formData.designation.length > 1, 'text-red-500': formData.designation.length === 1}"  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="space-y-2 relative group">
                            <label for="department_id" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Department
                            </label>
                            <div class="relative">
                                <select 
                                    id="department_id"
                                    wire:model.lazy="formData.department_id"
                                    x-model="formData.department_id"
                                    @change="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    required
                                >
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-5 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.department_id.length > 0, 'opacity-0': formData.department_id.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Directorate -->
                        <div class="space-y-2 relative group">
                            <label for="directorate_id" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Directorate
                            </label>
                            <div class="relative">
                                <select 
                                    id="directorate_id"
                                    wire:model.lazy="formData.directorate_id"
                                    x-model="formData.directorate_id"
                                    @change="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    required
                                >
                                    <option value="">Select Directorate</option>
                                    @foreach($directorates as $directorate)
                                        <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-5 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.directorate_id.length > 0, 'opacity-0': formData.directorate_id.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Branch -->
                        <div class="space-y-2 relative group">
                            <label for="branch_id" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 0116 0H2z"></path>
                                </svg>
                                Branch
                            </label>
                            <div class="relative">
                                <select 
                                    id="branch_id"
                                    wire:model.lazy="formData.branch_id"
                                    x-model="formData.branch_id"
                                    @change="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    required
                                >
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-5 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.branch_id.length > 0, 'opacity-0': formData.branch_id.length === 0 }">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Security -->
                    <div x-show="step === 3"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-4"
                         class="space-y-6"
                    >
                        


                        <!-- Password Field with Show/Hide -->
                        <div class="space-y-2 relative group">
                            <label for="password" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Password
                            </label>

                            <div class="relative group">
                                <input 
                                    :type="showPassword ? 'text' : 'password'"
                                    id="password"
                                    wire:model.lazy="formData.password"
                                    x-model="formData.password"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 pr-12
                                        focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 
                                        transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-red-300 focus:border-red-400 focus:ring-red-200': formData.password.length > 0 && !passwordValid,
                                        'border-green-300 focus:border-green-400 focus:ring-green-200': passwordValid
                                    }"
                                    placeholder="Enter your password"
                                    required
                                >

                                <!-- Password Visibility Toggle -->
                                <button 
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition-colors"
                                    :aria-label="showPassword ? 'Hide password' : 'Show password'"
                                >
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Password Strength Indicator -->
                            <div class="mt-2" x-show="formData.password.length > 0">
                                <div class="flex gap-2">
                                    <div class="h-1 flex-1 rounded-full bg-gray-200 overflow-hidden">
                                        <div class="h-full transition-all duration-300"
                                            :class="{
                                                'w-1/4 bg-red-400': passwordStrength === 1,
                                                'w-1/2 bg-yellow-400': passwordStrength === 2,
                                                'w-3/4 bg-yellow-400': passwordStrength === 3,
                                                'w-full bg-green-400': passwordStrength === 4
                                            }">
                                        </div>
                                    </div>
                                    <span class="text-xs"
                                        :class="{
                                            'text-red-500': passwordStrength === 1,
                                            'text-yellow-500': passwordStrength === 2 || passwordStrength === 3,
                                            'text-green-500': passwordStrength === 4
                                        }"
                                        x-text="passwordStrength === 1 ? 'Weak' : (passwordStrength === 2 || passwordStrength === 3 ? 'Medium' : 'Strong')">
                                    </span>
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <div class="mt-2 space-y-2">
                                <p class="text-xs text-gray-500 pl-2">Password must contain:</p>
                                <div class="grid grid-cols-2 gap-2 text-xs pl-4">
                                    <div class="flex items-center gap-1 text-gray-400" 
                                        :class="{ 'text-green-500': formData.password.length >= 8, 'text-red-400': formData.password.length < 8 && formData.password.length > 0 }"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        At least 8 characters
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" 
                                        :class="{ 'text-green-500': /[A-Z]/.test(formData.password), 'text-red-400': !/[A-Z]/.test(formData.password) && formData.password.length > 0 }"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One uppercase letter
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" 
                                        :class="{ 'text-green-500': /[0-9]/.test(formData.password), 'text-red-400': !/[0-9]/.test(formData.password) && formData.password.length > 0 }"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One number
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" 
                                        :class="{ 'text-green-500': /[!@#$%^&*]/.test(formData.password), 'text-red-400': !/[!@#$%^&*]/.test(formData.password) && formData.password.length > 0 }"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One special character
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2 relative group">
                            <label for="password_confirmation" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="password_confirmation"
                                    wire:model.lazy="formData.password_confirmation"
                                    x-model="formData.password_confirmation"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 pr-12
                                        focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 
                                        transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-red-300 focus:border-red-400 focus:ring-red-200': formData.password_confirmation.length > 0 && formData.password_confirmation !== formData.password,
                                        'border-green-400 focus:border-green-400 focus:ring-green-200': formData.password_confirmation === formData.password && formData.password_confirmation.length > 0
                                    }"
                                    placeholder="Re-enter your password"
                                    required
                                >
                                <!-- Validation Icon -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': formData.password_confirmation.length > 0, 'opacity-0': formData.password_confirmation.length === 0 }">
                                    <svg class="w-5 h-5" :class="{'text-green-500': formData.password_confirmation === formData.password, 'text-red-500': formData.password_confirmation.length > 0 && formData.password_confirmation !== formData.password}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <!-- Contextual Help -->
                            <p class="text-xs text-gray-500 pl-2">Re-enter your password for confirmation</p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Navigation Buttons -->
                <div class="flex justify-between mt-8 gap-4">
                    <!-- Previous Button -->
                    <button 
                        type="button"
                        x-show="step > 1"
                        @click="step--"
                        class="flex items-center px-6 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-400/50"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Previous
                    </button>
                    
                    <!-- Next Button -->
                    <button 
                        type="button"
                        x-show="step < totalSteps"
                        @click="step++; checkFormValidity();"
                        class="flex items-center px-6 py-2 bg-yellow-400 text-black rounded-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-400/50"
                        :class="{ 'hover:bg-yellow-500 cursor-pointer': formValid, 'cursor-not-allowed opacity-50': !formValid }"
                        :disabled="!formValid || loading"
                    >
                        Next
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                                    
                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        x-show="step === totalSteps"
                        class="flex items-center px-6 py-2 bg-yellow-400 text-black rounded-lg hover:bg-yellow-500 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-400/50 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="!formValid || loading"
                    >
                        <span x-show="!loading">Complete Registration</span>
                        <div x-show="loading" class="flex items-center">
                            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                            </svg>
                            Processing...
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Move Styles to External CSS or Inside Root Element -->
    <style>
        .perspective-1000 {
            perspective: 1000px;
        }
        .ease-out-expo {
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        [x-cloak] { display: none !important; }
    </style>
</div>