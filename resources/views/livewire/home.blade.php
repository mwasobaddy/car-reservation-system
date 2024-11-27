<div class="min-h-screen bg-gradient-to-br from-[#ffffff] via-yellow-100 to-[#F8EBD5]">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center lg:text-left grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-5xl font-bold bg-gradient-to-r from-black via-gray-700 to-yellow-600 bg-clip-text text-transparent leading-tight">
                        Streamline Your Field Operations
                    </h1>
                    <p class="text-xl text-gray-700 leading-relaxed">
                        Request vehicles, track memos, and coordinate with drivers - all in one place. Our intelligent system manages your transportation needs efficiently.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" 
                           class="px-8 py-4 bg-yellow-400 text-black font-medium rounded-xl shadow-lg transition-all duration-300 hover:bg-yellow-300 hover:shadow-xl transform hover:-translate-y-1">
                            Request a Vehicle
                        </a>
                        <a href="#" 
                           class="px-8 py-4 border-2 border-yellow-400 text-black font-medium rounded-xl transition-all duration-300 hover:bg-yellow-400/10">
                            Track Requests
                        </a>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <img src="{{ asset('storage/images/dashboard-preview.webp') }}" 
                         alt="Dashboard Preview" 
                         class="rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Features Section -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">→ System Features and Capabilities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Vehicle Request Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-4 text-green-600 transition-transform transform hover:scale-[1.15] hover:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 11V7a2 2 0 012-2h12a2 2 0 012 2v4l2 6v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2l2-6zm4 0h12l-1-4H5l-1 4z"></path>
                </svg>                
                <h3 class="text-xl font-semibold text-gray-800">Vehicle Request System</h3>
                <p class="text-gray-600 mt-2">Submit and manage vehicle requests for field activities with real-time status updates.</p>
                <ul class="mt-4 space-y-2">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Track request status
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Automated notifications
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Customizable approval workflows
                    </li>
                </ul>
            </div>

            <!-- Trip Scheduling Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-4 text-red-600 transition-transform transform hover:scale-[1.15] hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M3 5h18M3 10h18M3 15h18M3 20h18" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Trip Scheduling</h3>
                <p class="text-gray-600 mt-2">Schedule trips efficiently and ensure timely departures and arrivals.</p>
                <ul class="mt-4 space-y-2">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Real-time updates
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Automated reminders
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Conflict-free scheduling
                    </li>
                </ul>
            </div>
            
            <!-- System Security Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-4 text-blue-600 transition-transform transform hover:scale-[1.15] hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M6 10V7a6 6 0 0112 0v3h2a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2v-7a2 2 0 012-2h2zM6 10h12V7a4 4 0 00-8 0v3H6z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">System Security</h3>
                <p class="text-gray-600 mt-2">Enhance user account security with Two-Factor Authentication (2FA).</p>
                <ul class="mt-4 space-y-2">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Two-layer authentication
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        OTP-based login
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Prevent unauthorized access
                    </li>
                </ul>
            </div>
            
        </div>
    </div>



    <!-- Statistics Section -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">→ Key Metrics</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $stats = [
                    ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" class="stroke-current"></circle>
                                    <path d="M9 12l2 2 4-4" class="stroke-current"></path>
                                </svg>',
                     'label' => 'Active Requests',
                     'value' => '150'
                    ],
                    ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" class="stroke-current"></circle>
                                    <path d="M9 12l2 2 4-4" class="stroke-current"></path>
                                </svg>',
                     'label' => 'Completed Trips',
                     'value' => '120'
                    ],
                    ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" class="stroke-current"></circle>
                                    <path d="M12 6v6l4 2" class="stroke-current"></path>
                                </svg>',
                     'label' => 'Pending Approvals',
                     'value' => '30'
                    ],
                    ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" class="stroke-current"></circle>
                                    <path d="M15 9l-6 6m0-6l6 6" class="stroke-current"></path>
                                </svg>',
                     'label' => 'Cancelled Requests',
                     'value' => '10'
                    ],
                ];
            @endphp

            @foreach($stats as $stat)
                <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-2xl transition-shadow duration-300 flex items-center space-x-4">
                    <div class="w-fit h-fit">
                        {!! $stat['icon'] !!}
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">{{ $stat['label'] }}</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stat['value'] }}</h3>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Department Activity -->
        <div x-data="departmentChartComponent()" x-init="initChart()" class="container mx-auto py-12">
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 pb-6 text-center">Top Departments</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Department Travel Chart -->
                    <div class="h-64">
                        <canvas id="departmentChart" aria-label="Bar chart showing number of trips per department" role="img"></canvas>
                    </div>
                    <!-- Top Departments List -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-800">Department Ranks</h3>
                        <ol class="space-y-2 list-decimal">
                            @php
                                $departments = [
                                    ['name' => 'Department A', 'trips' => 50],
                                    ['name' => 'Department B', 'trips' => 45],
                                    ['name' => 'Department C', 'trips' => 40],
                                    ['name' => 'Department D', 'trips' => 35],
                                    ['name' => 'Department E', 'trips' => 30],
                                ];
                            @endphp

                            @foreach($departments as $dept)
                                <li class="flex justify-between items-center">
                                    <span class="text-gray-600">{{ $dept['name'] }}</span>
                                    <span class="text-gray-900 font-bold">{{ $dept['trips'] }} Trips</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            function departmentChartComponent() {
                return {
                    chart: null,
                    initChart() {
                        const ctx = document.getElementById('departmentChart').getContext('2d');
                        this.chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Department A', 'Department B', 'Department C', 'Department D', 'Department E'],
                                datasets: [{
                                    label: 'Number of Trips',
                                    data: [50, 45, 40, 35, 30],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 10
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    }
                }
            }
        </script>
    </div>

    <!-- Communication Hub -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">→ Need Help?</h2>
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Contact Admin</h3>
                    <p class="text-gray-600">Get quick responses for your queries</p>
                    <button class="px-6 py-3 bg-yellow-400 text-black font-medium rounded-lg transition-all duration-300 hover:bg-yellow-500">
                        Start Chat
                    </button>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Quick Support</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="#" class="text-gray-600 hover:text-yellow-600 transition-colors duration-300">FAQs</a>
                        <a href="#" class="text-gray-600 hover:text-yellow-600 transition-colors duration-300">User Guide</a>
                        <a href="#" class="text-gray-600 hover:text-yellow-600 transition-colors duration-300">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>