<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- User Dashboard Header -->
        <h1 class="text-2xl font-bold mb-4">Driver Dashboard</h1>
        
        <!-- Dynamic Route Content -->
        <div class="mb-8">
            @if(request()->routeIs('home'))
                @livewire('home')
            @elseif(request()->routeIs('login'))
                @livewire('auth.login')
            @elseif(request()->routeIs('register'))
                @livewire('auth.register')
            @elseif(request()->routeIs('contact'))
                @livewire('contact-form')
            @endif
        </div>

        <!-- User Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">My Bookings</h2>
                <!-- Booking content -->
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>
                <!-- Activities content -->
            </div>
        </div>
    </div>
</div>