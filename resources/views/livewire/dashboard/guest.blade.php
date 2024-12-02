<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto px-4 py-8">
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
    </div>
</div>