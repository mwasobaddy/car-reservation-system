<div class="min-h-screen flex lg:items-center justify-center bg-gradient-to-br from-[#fff200] via-yellow-100 to-white overflow-hidden">
    <div class="container-sm mx-auto xl:mx-[200px] flex lg:flex-row md:flex-col flex-wrap items-stretch justify-center min-h-[600px] w-full bg-white/90 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 hover:shadow-[0_8px_40px_rgb(0,0,0,0.16)] relative">
        
        <!-- Left Panel with Enhanced Visual Storytelling -->
        <div class="lg:w-1/2 w-full relative overflow-hidden rounded-l-3xl hidden lg:block group">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-transparent z-10 transition-opacity duration-500 group-hover:opacity-50"></div>
            <img 
                src="{{ asset('storage/images/hilux-img.webp') }}" 
                alt="Toyota Hilux"
                class="w-full h-full object-cover object-center transform transition-all duration-700 group-hover:scale-110"
                loading="eager"
            >
            <!-- Enhanced Content Overlay -->
            <div class="absolute inset-0 z-20 flex flex-col justify-end p-10 translate-y-0 transition-transform duration-500 group-hover:translate-y-[-10px]">
                <div class="space-y-4 max-w-md">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium bg-yellow-400/90 text-black rounded-full backdrop-blur-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Secure Login
                    </span>
                    <h2 class="text-4xl font-bold text-white">Your Journey <br/>Begins Here</h2>
                    <p class="text-white/90 leading-relaxed">Experience the freedom of premium car rentals with industry-leading security and service.</p>
                    <div class="flex items-center gap-4 pt-4">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                        </div>
                        <span class="text-sm text-white/80">Join 2,000+ happy customers</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel with Enhanced UX -->
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center p-8 lg:p-12 xl:p-16">
            <!-- Animated Header -->
            <div class="text-center space-y-4 mb-8 relative">
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
                    Welcome Back
                </h1>
                <p class="text-gray-600">Sign in to continue your journey</p>
            </div>

            <div x-data="{ activeTab: 'email' }" class="w-full">
                <!-- Login Method Toggles -->
                <div class="flex justify-center space-x-4 p-1 bg-gray-100/50 backdrop-blur-sm rounded-xl w-fit justify-self-center mb-4">
                    <button
                        type="button"
                        @click="activeTab = 'email'"
                        :class="{'bg-white shadow-sm text-yellow-600': activeTab === 'email',
                                'text-gray-600 hover:text-yellow-600': activeTab !== 'email'}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        Email Login
                    </button>
                    <button
                        type="button"
                        @click="activeTab = 'mobile'"
                        :class="{'bg-white shadow-sm text-yellow-600': activeTab === 'mobile',
                                'text-gray-600 hover:text-yellow-600': activeTab !== 'mobile'}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 5z"/>
                        </svg>
                        Mobile Login
                    </button>
                </div>
                <div class="flex justify-center" x-show="activeTab === 'email'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                >
                    <!-- Enhanced Email Login Form -->
                    <form wire:submit.prevent="loginWithEmail" class="w-full max-w-md space-y-6" x-data="{ 
                        showPassword: false,
                        formValid: false,
                        identifier: '',
                        password: '',
                        loading: false,
                        get passwordValid() {
                            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                            return passwordRegex.test(this.password);
                        },
                        get emailValid() {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            return emailRegex.test(this.identifier);
                        },
                        get passwordStrength() {
                            let strength = 0;
                            if (this.password.length >= 8) strength++;
                            if (/[A-Z]/.test(this.password)) strength++;
                            if (/\d/.test(this.password)) strength++;
                            if (/[!@#$%^&*]/.test(this.password)) strength++;
                            return strength;
                        },
                        checkFormValidity() {
                            this.formValid = 
                                this.identifier !== '' && 
                                this.password !== '' &&
                                this.emailValid && 
                                this.passwordValid;
                        }
                    }">
                        <!-- Email Field with Enhanced Validation -->
                        <div class="space-y-2 relative group">
                            <label for="email" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                Email Address
                            </label>
                            <div class="relative">
                                <input 
                                    type="email" 
                                    id="email"
                                    wire:model.lazy="identifier"
                                    x-model="identifier"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-green-400': identifier.length > 0 && emailValid,
                                        'border-red-400': identifier.length > 0 && !emailValid
                                    }"
                                    placeholder="you@example.com"
                                    required
                                    autofocus
                                >
                                @error('identifier') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <!-- Enhanced Visual Feedback -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                    :class="{
                                        'opacity-100': identifier.length > 0,
                                        'opacity-0': identifier.length === 0 }">
                                    <svg class="w-5 h-5"
                                        :class="{
                                            'text-green-500': emailValid,
                                            'text-red-500': identifier.length > 0 && !emailValid
                                        }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <!-- Contextual Help -->
                            <p class="text-xs text-gray-500 pl-2">Enter the email address associated with your account</p>
                        </div>
                    
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
                                    id="password1"
                                    wire:model.lazy="password"
                                    x-model="password"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 pr-12
                                        focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 
                                        transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-red-300 focus:border-red-400 focus:ring-red-200': password.length > 0 && !passwordValid,
                                        'border-green-300 focus:border-green-400 focus:ring-green-200': passwordValid
                                    }"
                                    placeholder="Enter your password"
                                    required
                                >
                                @error('password') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
                            <div class="mt-2" x-show="password.length > 0">
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
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': password.length >= 8, 'text-red-400': password.length < 8 && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        At least 8 characters
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[A-Z]/.test(password), 'text-red-400': !/[A-Z]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One uppercase letter
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[0-9]/.test(password), 'text-red-400': !/[0-9]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One number
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[!@#$%^&*]/.test(password), 'text-red-400': !/[!@#$%^&*]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One special character
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Enhanced Submit Button -->
                        <button 
                            type="submit"
                            class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black rounded-xl font-medium 
                                transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]
                                focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2
                                disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="!formValid || loading"
                            x-bind:class="{'cursor-not-allowed': !formValid || loading}"
                        >
                            <span x-show="!loading">Sign In</span>
                            <div x-show="loading" class="flex items-center justify-center">
                                <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </div>
                        </button>
                    </form>
                </div>

                <div class="flex justify-center" x-show="activeTab === 'mobile'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-x-4"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                >
                    <!-- Enhanced Mobile Login Form -->
                    <form wire:submit.prevent="loginWithMobile" class="w-full max-w-md space-y-6" x-data="{ 
                        showPassword: false,
                        formValid: false,
                        identifier: '',
                        password: '',
                        loading: false,
                        get passwordValid() {
                            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                            return passwordRegex.test(this.password);
                        },
                        get passwordStrength() {
                            let strength = 0;
                            if (this.password.length >= 8) strength++;
                            if (/[A-Z]/.test(this.password)) strength++;
                            if (/\d/.test(this.password)) strength++;
                            if (/[!@#$%^&*]/.test(this.password)) strength++;
                            return strength;
                        },
                        get mobileValid() {
                            return /^07\d{8}$/.test(this.identifier);
                        },
                        checkFormValidity() {
                            const mobileRegex = /^07\d{8}$/;
                            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

                            this.formValid = 
                                this.identifier !== null && 
                                this.password !== null &&
                                mobileRegex.test(this.identifier) && 
                                passwordRegex.test(this.password);
                        }
                    }">
                        <!-- Mobile Number Field with Enhanced Validation -->
                        <div class="space-y-2 relative group">
                            <label for="mobile" class="text-sm font-medium text-gray-700 flex items-center gap-2 group-focus-within:text-yellow-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 5z"/>
                                </svg>
                                Mobile Number
                            </label>
                            <div class="relative">
                                <input 
                                    type="tel" 
                                    id="mobile"
                                    wire:model.lazy="identifier"
                                    x-model="identifier"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-green-400': identifier.length > 0 && mobileValid,
                                        'border-red-400': identifier.length > 0 && !mobileValid
                                    }"
                                    placeholder="0712345678"
                                    required
                                    autofocus
                                    maxlength="10"
                                >
                                <!-- Enhanced Visual Feedback -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 transition-all"
                                    :class="{ 'opacity-100': identifier.length > 0, 'opacity-0': identifier.length === 0 }">
                                    <svg class="w-5 h-5"
                                        :class="{
                                            'text-green-500': mobileValid,
                                            'text-red-500': identifier.length > 0 && !mobileValid
                                        }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('identifier') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- Contextual Help -->
                            <p class="text-xs text-gray-500 pl-2">Enter your mobile number starting with 07</p>
                        </div>

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
                                    id="password2"
                                    wire:model.lazy="password"
                                    x-model="password"
                                    @input="checkFormValidity"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 pr-12
                                        focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 
                                        transition-all text-gray-800 bg-white/50 backdrop-blur-sm pl-10"
                                    :class="{
                                        'border-red-300 focus:border-red-400 focus:ring-red-200': password.length > 0 && !passwordValid,
                                        'border-green-300 focus:border-green-400 focus:ring-green-200': passwordValid
                                    }"
                                    placeholder="Enter your password"
                                    required
                                >
                                @error('password') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
                            <div class="mt-2" x-show="password.length > 0">
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
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': password.length >= 8, 'text-red-400': password.length < 8 && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        At least 8 characters
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[A-Z]/.test(password), 'text-red-400': !/[A-Z]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One uppercase letter
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[0-9]/.test(password), 'text-red-400': !/[0-9]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One number
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400" :class="{ 'text-green-500': /[!@#$%^&*]/.test(password), 'text-red-400': !/[!@#$%^&*]/.test(password) && password.length > 0 }">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        One special character
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Submit Button -->
                        <button 
                            type="submit"
                            class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black rounded-xl font-medium 
                                transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]
                                focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2
                                disabled:opacity-50 disabled:cursor-not-allowed"
                            :disabled="!formValid || loading"
                            x-bind:class="{'cursor-not-allowed': !formValid || loading}"
                        >
                            <span x-show="!loading">Sign In</span>
                            <div x-show="loading" class="flex items-center justify-center">
                                <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </div>
                        </button>
                    </form>
                </div>
                
                <!-- Enhanced Social Proof -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">Trusted by over 2,000 customers</p>
                    <div class="text-center mt-4 space-x-2">
                        <p class="text-sm text-gray-500">Choose your preferred login method</p>
                        <div class="flex justify-center mt-4 space-x-2">
                            <span class="text-xs text-gray-400">Secure Authentication</span>
                            <span class="text-xs text-gray-400">•</span>
                            <span class="text-xs text-gray-400">Simple Access</span>
                            <span class="text-xs text-gray-400">•</span>
                            <span class="text-xs text-gray-400">24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>