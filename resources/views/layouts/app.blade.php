<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Panel')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-sidebar { background-color: #4B0082; }
        .text-sidebar-inactive { color: #9a96b8; }
        .bg-main { background-color: #F5F7FA; }
        [x-cloak] { display: none !important; }


    </style>
    @stack('styles')
</head>

<body class="bg-main flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 shrink-0 bg-[#4B0082] text-white h-screen flex flex-col py-6">
    <div class="px-6 mb-8 text-xl font-bold">Admin Panel</div>
    
    <nav class="flex-1 overflow-y-auto px-4 space-y-2">
        <!-- Dashboard Menu -->
        <a href="{{ route('dashboard') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 
   {{ request()->routeIs('dashboard') ? 'bg-[#4d44b5] text-white' : 'text-gray-300 hover:text-white hover:bg-[#4d44b5]' }}">
    <span>📊</span> Dashboard
</a>

<a href="{{ route('event-requests.index') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 
   {{ request()->routeIs('event-requests.*') ? 'bg-[#4d44b5] text-white' : 'text-gray-300 hover:text-white hover:bg-[#4d44b5]' }}">
    <span>📝</span> Event Requests
</a>

<a href="{{ route('material-requests.index') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('material-requests.*') ? 'bg-[#4d44b5] text-white' : 'text-gray-300 hover:text-white hover:bg-[#4d44b5]' }}">
    <span>📄</span> Material Requests
</a>
    </nav>
</aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>