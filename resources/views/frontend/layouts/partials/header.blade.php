<!-- Navbar -->
<header class="bg-black py-4 header-section sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-4">

        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="/">
                <img src="{{ asset('frontend/assetes/image/image 94.png') }}" alt="Logo" class="h-10 w-auto">
            </a>
        </div>

        <!-- Right-side navigation group -->
        <div class="flex items-center space-x-4 ml-auto">
            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-4 text-sm tracking-wider">
                <a href="{{route('f.home')}}" 
                   class="{{ request()->routeIs('f.home') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Home
                </a>
                <a href="{{ route('f.about') }}" 
                   class="{{ request()->routeIs('f.about') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    About Us
                </a>
                <a href="{{ route('f.servic') }}" 
                   class="{{ request()->routeIs('f.servic') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Our Services
                </a>
                <a href="{{ route('f.memberShip') }}" 
                   class="{{ request()->routeIs('f.memberShip') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Membership
                </a>
                <a href="{{ route('f.insight') }}" 
                   class="{{ request()->routeIs('f.insight') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Insights
                </a>
                <a href="{{ route('f.contact') }}" 
                   class="{{ request()->routeIs('f.contact') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Contact
                </a>
                <a href="{{ route('f.privacy-policy') }}" 
                   class="{{ request()->routeIs('f.privacy-policy') ? 'text-[#caa36b] underline' : 'hover:underline' }}">
                    Privacy Policy
                </a>
            </nav>
           
            <!-- Desktop JOIN US button -->
            <a href="{{ route('f.login') }}" 
               class="hidden md:inline-block border border-[#caa36b] px-4 py-1 rounded-lg text-sm transition text-[#caa36b]">
                JOIN US
            </a>

            <!-- Mobile Hamburger Menu Button -->
            <label for="my-drawer-3" class="bg-black md:hidden btn btn-primary px-4 py-4 text-sm">
                <i class="fas fa-bars text-[#ee9506]"></i>
            </label>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div class="drawer drawer-end">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu bg-black text-[#d4a75f] min-h-full w-80 p-6">
                <li>
                    <label for="my-drawer-3" class="btn btn-square btn-ghost btn-circle"
                           aria-label="close sidebar">✕</label>
                </li>
                <a href="/" class="{{ request()->routeIs('home') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Home</a>
                <a href="{{ route('f.about') }}" class="{{ request()->routeIs('f.about') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">About Us</a>
                <a href="{{ route('f.servic') }}" class="{{ request()->routeIs('f.servic') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Our Services</a>
                <a href="{{ route('f.memberShip') }}" class="{{ request()->routeIs('f.memberShip') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Membership</a>
                <a href="{{ route('f.insight') }}" class="{{ request()->routeIs('f.insight') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Insights</a>
                <a href="{{ route('f.contact') }}" class="{{ request()->routeIs('f.contact') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Contact</a>
                <a href="{{ route('f.privacy-policy') }}" class="{{ request()->routeIs('f.privacy-policy') ? 'text-[#caa36b] underline' : 'hover:underline' }} p-2">Privacy Policy</a>
                <a href="{{ route('f.login') }}" class="border border-[#caa36b] px-4 py-1 rounded-lg text-sm transition block text-center">
                    JOIN US
                </a>
            </ul>
        </div>
    </div>
</header>
