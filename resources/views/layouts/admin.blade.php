<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-gray-300 flex flex-col">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                    🤖 AI News Admin
                </a>
            </div>
            <nav class="flex-1 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.posts.index') }}"
                   class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.posts.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                    📝 Bài viết
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-600 text-white' : 'hover:bg-gray-800 hover:text-white' }} transition">
                    📁 Danh mục
                </a>
                <hr class="border-gray-700 my-4">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-gray-800 hover:text-white transition">
                    🌐 Xem trang chủ
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-red-400 hover:bg-gray-800 hover:text-red-300 transition text-left">
                        🚪 Đăng xuất
                    </button>
                </form>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <p class="text-xs text-gray-500">{{ auth()->user()->name ?? 'Admin' }}</p>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            </header>

            <main class="flex-1 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
