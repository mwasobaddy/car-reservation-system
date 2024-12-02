{{-- <!-- resources/views/livewire/auth/otp-verification.blade.php -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#fff200] via-yellow-100 to-white">
    <div class="max-w-md w-full p-8 bg-white/90 backdrop-blur-xl rounded-3xl shadow-xl">
        <!-- Header -->
        <div class="text-center space-y-4 mb-8">
            <lord-icon
                src="https://cdn.lordicon.com/bbnkwdur.json"
                trigger="loop"
                colors="primary:#121331,secondary:#c67d53"
                class="w-20 h-20 mx-auto">
            </lord-icon>
            <h2 class="text-2xl font-bold">Verify Your Identity</h2>
            <p class="text-sm text-gray-600">
                We've sent a verification code to<br>
                <span class="font-medium text-black">{{ substr(session('pending_otp_user')->email, 0, 3) }}•••@{{ explode('@', session('pending_otp_user')->email)[1] }}</span>
            </p>
        </div>

        <!-- OTP Input -->
        <div class="space-y-6">
            <div class="flex justify-center gap-2">
                @foreach($otp as $index => $digit)
                    <input
                        type="text"
                        wire:model.defer="otp.{{ $index }}"
                        class="w-12 h-12 text-center text-xl font-semibold rounded-lg border-2 border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200"
                        maxlength="1"
                        x-on:keyup="$event.target.value && $event.target.nextElementSibling?.focus()"
                        x-on:keydown.backspace="!$event.target.value && $event.target.previousElementSibling?.focus()"
                        inputmode="numeric"
                        pattern="[0-9]*"
                    >
                @endforeach
            </div>

            <!-- Timer & Resend -->
            <div class="text-center text-sm">
                <p class="text-gray-600">
                    Code expires in: 
                    <span class="font-medium" x-data="timer({{ $remainingTime }})" x-text="timeLeft"></span>
                </p>
                <button 
                    wire:click="resendOTP"
                    class="mt-2 text-yellow-600 hover:text-yellow-700"
                    wire:loading.attr="disabled"
                >
                    Resend Code
                </button>
            </div>

            <!-- Verify Button -->
            <button
                wire:click="verifyOTP"
                class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black rounded-xl font-medium
                       transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Verify</span>
                <span wire:loading>Verifying...</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function timer(initialSeconds) {
        return {
            timeLeft: '',
            seconds: initialSeconds,
            init() {
                this.updateTime();
                setInterval(() => {
                    this.seconds--;
                    this.updateTime();
                }, 1000);
            },
            updateTime() {
                const minutes = Math.floor(this.seconds / 60);
                const seconds = this.seconds % 60;
                this.timeLeft = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }
        };
    }
</script>
@endpush --}}


<div class="min-h-screen flex lg:items-center justify-center bg-gradient-to-br from-[#fff200] via-yellow-100 to-white overflow-hidden">
    <div class="container-sm mx-auto xl:mx-[200px] flex lg:flex-row md:flex-col flex-wrap items-stretch justify-center min-h-[600px] w-full bg-white/90 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 hover:shadow-[0_8px_40px_rgb(0,0,0,0.16)] relative">
        
        <!-- Left Panel -->
        <div class="lg:w-1/2 w-full relative overflow-hidden rounded-l-3xl hidden lg:block group">
            <!-- Keep your existing left panel code -->
        </div>

        <!-- Right Panel - OTP Verification -->
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center p-8 lg:p-12 xl:p-16">
            <!-- Animated Header -->
            <div class="text-center space-y-4 mb-12">
                <div class="inline-block p-4 bg-yellow-100 rounded-2xl mb-6 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-200 to-yellow-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <lord-icon
                        src="https://cdn.lordicon.com/ncxoarcp.json"
                        trigger="loop"
                        stroke="bold"
                        colors="primary:#121331,secondary:#c67d53,tertiary:#fff200"
                        class="w-20 h-20"
                    ></lord-icon>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-black via-gray-700 to-yellow-600 bg-clip-text text-transparent">
                    Verify Your Identity
                </h1>
                <p class="text-gray-600">Enter the 6-digit code sent to your {{ $method === 'email' ? 'email' : 'phone' }}</p>
                <div class="text-sm text-gray-500 mt-2">
                    <span class="font-medium">{{ $maskedDestination }}</span>
                </div>
            </div>

            <!-- OTP Input Form -->
            <form wire:submit.prevent="verifyOtp" class="w-full max-w-md" x-data="{
                otp: ['', '', '', '', '', ''],
                focusedInput: 0,
                loading: false,
                
                init() {
                    this.$nextTick(() => this.$refs.digit_0.focus());
                },
                
                inputDigit(index, event) {
                    const input = event.target;
                    const value = event.target.value;
                    const nextInput = this.$refs[`digit_${index + 1}`];
                    const prevInput = this.$refs[`digit_${index - 1}`];
                    
                    // Allow only numbers
                    if (!/^\d*$/.test(value)) {
                        input.value = '';
                        return;
                    }
                    
                    // Auto-advance to next input
                    if (value && nextInput && index < 5) {
                        nextInput.focus();
                        this.focusedInput = index + 1;
                    }
                    
                    // Handle backspace
                    if (event.key === 'Backspace' && prevInput && !value) {
                        prevInput.focus();
                        this.focusedInput = index - 1;
                    }
                    
                    // Update OTP array
                    this.otp[index] = value.slice(-1);
                    
                    // Update Livewire component
                    this.$wire.set('otp', this.otp.join(''));
                }
            }">
                <div class="flex justify-between gap-2 mb-8">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="w-12 h-16">
                        <input
                            type="text"
                            maxlength="1"
                            x-ref="digit_{{ $i }}"
                            x-on:input="inputDigit({{ $i }}, $event)"
                            x-on:keydown.backspace="inputDigit({{ $i }}, $event)"
                            x-on:focus="focusedInput = {{ $i }}"
                            x-bind:class="{
                                'border-yellow-400 ring-2 ring-yellow-200': focusedInput === {{ $i }},
                                'border-gray-200': focusedInput !== {{ $i }}
                            }"
                            class="w-full h-full text-center text-2xl font-bold rounded-xl border bg-white/50 backdrop-blur-sm
                                   focus:outline-none transition-all duration-300 text-gray-800"
                            inputmode="numeric"
                            pattern="\d*"
                            autocomplete="one-time-code"
                        >
                    </div>
                    @endfor
                </div>

                @error('otp')
                    <p class="text-red-500 text-sm text-center mb-4">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-black rounded-xl font-medium 
                           transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]
                           focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2
                           disabled:opacity-50 disabled:cursor-not-allowed"
                    x-bind:disabled="otp.join('').length !== 6 || loading"
                >
                    <span x-show="!loading">Verify Code</span>
                    <div x-show="loading" class="flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Verifying...
                    </div>
                </button>

                <!-- Resend Code Section -->
                <div class="mt-8 text-center space-y-4">
                    <p class="text-sm text-gray-600">
                        Didn't receive the code? 
                        <button 
                            type="button"
                            wire:click="resendCode"
                            class="text-yellow-600 hover:text-yellow-700 font-medium focus:outline-none"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-50 cursor-not-allowed"
                        >
                            Resend
                        </button>
                    </p>
                    <div wire:loading wire:target="resendCode">
                        <span class="text-sm text-gray-500">Sending new code...</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>