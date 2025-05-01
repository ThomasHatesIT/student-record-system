<nav class="bg-gray-800 text-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-semibold hover:text-gray-300">
            Student Management
        </a>

        <!-- Hamburger for mobile -->
        <button id="menu-toggle" class="lg:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Menu links -->
        <div id="menu" class="hidden lg:flex flex-col lg:flex-row lg:space-x-6 space-y-2 lg:space-y-0 mt-4 lg:mt-0">
            <a href="#" class="hover:text-gray-300 {{ request()->routeIs('students.*') ? 'underline' : '' }}">
                Students
            </a>
            <a href="#" class="hover:text-gray-300 {{ request()->routeIs('courses.*') ? 'underline' : '' }}">
                Courses
            </a>
        </div>
    </div>
</nav>

<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    toggleBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
