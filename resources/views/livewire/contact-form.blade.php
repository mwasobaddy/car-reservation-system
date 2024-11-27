<div class="min-h-screen flex lg:items-center justify-center bg-gradient-to-br from-[#fff200] via-yellow-100 to-white overflow-hidden">
    <div class="container-sm mx-auto xl:mx-[200px] flex lg:flex-row flex-wrap items-stretch justify-center min-h-[600px] w-full bg-white/90 backdrop-blur-xl rounded-3xl shadow-lg transition-all duration-300 hover:shadow-xl relative">
        
        <!-- Left Panel -->
        <div class="lg:w-1/2 w-full relative overflow-hidden rounded-l-3xl hidden lg:block group">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-transparent z-10 transition-opacity duration-500 group-hover:opacity-50"></div>
            <img 
                src="{{ asset('storage/images/support.webp') }}" 
                alt="Support Team"
                class="w-full h-full object-cover object-center transform transition-all duration-700 group-hover:scale-110"
                loading="eager"
            >
            <!-- Content Overlay -->
            <div class="absolute inset-0 z-20 flex flex-col justify-between p-10">

                <!-- Quick Links -->
                <div class="mt-8 pt-8">
                    <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="flex items-center bg-white/50 backdrop-blur-sm rounded-lg hover:bg-gray-100 transition-all duration-300 faq-group">
                            <lord-icon
                                id="FAQ-icon"
                                src="https://cdn.lordicon.com/fjvfsqea.json"
                                trigger="hover"
                                stroke="bold"
                                colors="primary:#ffffff,secondary:#ffffff"
                                class="w-6 h-6 mr-2 pl-4">
                            </lord-icon>
                            <span id="FAQ-span" class="text-sm text-white p-4 w-full">FAQs</span>
                        </a>
                        
                        <a href="#" class="flex items-center bg-white/50 backdrop-blur-sm rounded-lg hover:bg-gray-100 transition-all duration-300 user-guide-group">
                            <lord-icon
                                id="user-guide-icon"
                                src="https://cdn.lordicon.com/psnhyobz.json"
                                trigger="hover"
                                stroke="bold"
                                colors="primary:#ffffff"
                                class="w-6 h-6 mr-2 pl-4">
                            </lord-icon>
                            <span id="user-guide-span" class="text-sm text-white p-4 w-full">User Guide</span>
                        </a>
                        
                    </div>
                </div>

                <div class="space-y-6 transform transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium bg-yellow-400/90 text-black rounded-full backdrop-blur-sm">
                        <lord-icon
                            src="https://cdn.lordicon.com/hbvyhtse.json"
                            trigger="hover"
                            class="w-4 h-4 mr-1">
                        </lord-icon>
                        24/7 Support
                    </span>
                    <h2 class="text-4xl font-bold text-white">We're Here <br/>To Help</h2>
                    <p class="text-white/90 leading-relaxed">Get in touch with our support team or report technical issues.</p>
                    
                    <!-- Support Stats -->
                    <div class="grid grid-cols-2 gap-4 pt-4">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                            <p class="text-2xl font-bold text-white">< 2hr</p>
                            <p class="text-sm text-white/80">Response Time</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                            <p class="text-2xl font-bold text-white">98%</p>
                            <p class="text-sm text-white/80">Resolution Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="lg:w-1/2 w-full flex flex-col p-8 lg:p-12 xl:p-16" x-data="{ activeTab: 'bug' }">
            <!-- Animated Header -->
            <div class="text-center space-y-4 mb-12 relative">
                <div class="inline-block p-4 bg-yellow-100 rounded-2xl mb-6 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-200 to-yellow-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <lord-icon
                        src="https://cdn.lordicon.com/jdgfsfzr.json"
                        trigger="loop"
                        stroke="bold"
                        colors="primary:#121331,secondary:#c67d53,tertiary:#fff200,quaternary:#000000,quinary:#ebe6ef"
                        class="w-20 h-20 transform group-hover:scale-110 transition-transform relative z-10"
                    ></lord-icon>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-black via-gray-700 to-yellow-600 bg-clip-text text-transparent">
                    Get In Touch
                </h1>
                <p class="text-gray-600">Have questions? We're here to help!</p>
            </div>
            <!-- Tabs -->
            <div class="flex space-x-4 mb-8">
                <button 
                    @click="activeTab = 'bug'" 
                    :class="{ 'bg-yellow-400 text-black': activeTab === 'bug', 'bg-gray-100 text-gray-600': activeTab !== 'bug' }"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300">
                    Report Bug
                </button>
                <button 
                    @click="activeTab = 'support'" 
                    :class="{ 'bg-yellow-400 text-black': activeTab === 'support', 'bg-gray-100 text-gray-600': activeTab !== 'support' }"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300">
                    Contact Admin
                </button>
            </div>

            <!-- Bug Report Form -->
            <div x-show="activeTab === 'bug'" x-transition>
                <form wire:submit.prevent="reportBug" class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Issue Type</label>
                        <select wire:model="issueType" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all">
                            <option>Technical Issue</option>
                            <option>Feature Request</option>
                            <option>Bug Report</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Description</label>
                        <textarea 
                            wire:model="description"
                            rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all"
                            placeholder="Describe the issue in detail..."
                        ></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Attachments</label>
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-1 text-center">
                            <input type="file" wire:model="attachments" class="hidden" id="file-upload">
                            <label for="file-upload" class="cursor-pointer">
                                <lord-icon
                                    src="https://cdn.lordicon.com/pqxdilfs.json"
                                    trigger="hover"
                                    class="w-12 h-12 mx-auto">
                                </lord-icon>
                                <p class="mt-2 text-sm text-gray-600">Drop files here or click to upload</p>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-yellow-400 text-black rounded-xl font-medium transition-all duration-300 hover:bg-yellow-500">
                        Submit Report
                    </button>
                </form>
            </div>

            <!-- Admin Support Form -->
            <div x-show="activeTab === 'support'" x-transition>
                <form wire:submit.prevent="contactAdmin" class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" wire:model="subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Message</label>
                        <textarea 
                            wire:model="message"
                            rows="4"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all"
                            placeholder="How can we help you today?"
                        ></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Priority</label>
                        <select wire:model="priority" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-200 transition-all">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-3 bg-yellow-400 text-black rounded-xl font-medium transition-all duration-300 hover:bg-yellow-500">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="mt-8 pt-8 border-t border-gray-200 block md:hidden lg:hidden xl:hidden">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-300">
                        <lord-icon
                            src="https://cdn.lordicon.com/nocovwne.json"
                            trigger="hover"
                            class="w-6 h-6 mr-2">
                        </lord-icon>
                        <span class="text-sm text-gray-600">FAQs</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all duration-300">
                        <lord-icon
                            src="https://cdn.lordicon.com/psnhyobz.json"
                            trigger="hover"
                            class="w-6 h-6 mr-2">
                        </lord-icon>
                        <span class="text-sm text-gray-600">User Guide</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const faqLink = document.querySelector('.faq-group');
            if (faqLink) {
                const faqIcon = document.getElementById('FAQ-icon');
                const faqText = faqLink.querySelector('#FAQ-span');
        
                faqLink.addEventListener('mouseenter', () => {
                    console.log(faqText);
                });
        
                faqLink.addEventListener('mouseleave', () => {
                    faqText.classList.remove('text-[#000000]');
                });
            }
        
            const userGuideLink = document.querySelector('.user-guide-group');
            if (userGuideLink) {
                const userGuideIcon = document.getElementById('user-guide-icon');
                const userGuideText = userGuideLink.querySelector('#user-guide-span');
        
                userGuideLink.addEventListener('mouseenter', () => {
                    console.log(userGuideText);
                });
        
                userGuideLink.addEventListener('mouseleave', () => {
                    userGuideText.classList.remove('text-[#000000]');
                });
            }
        })();
    </script>
</div>