@extends('layouts.app')

@section('title', 'Đăng nhập Admin')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50/50">
    <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
        <div class="text-center mb-8">
            <span class="text-4xl">🤖</span>
            <h2 class="mt-4 text-3xl font-bold font-serif text-gray-900 tracking-tight">Đăng nhập Admin</h2>
            <p class="mt-2 text-sm text-gray-500">Sử dụng tài khoản mặc định để vào Dashboard</p>
            <div class="mt-4 inline-block bg-gray-50 rounded-lg p-3 text-xs text-gray-600 text-left border border-gray-100">
                <p><strong>Email:</strong> admin@ainewshub.com</p>
                <p><strong>Password:</strong> password</p>
            </div>
        </div>

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf

            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm border border-red-100">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                           class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition sm:text-sm">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required
                           class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition sm:text-sm">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-600">Ghi nhớ đăng nhập</label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all duration-200 hover:-translate-y-0.5">
                    Đăng nhập hệ thống
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
