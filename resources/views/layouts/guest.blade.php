<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'FullStack Dev Challenge') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800">
  <div class="absolute inset-0 -z-10 pointer-events-none">
    <div class="mx-auto h-[28rem] w-[28rem] blur-3xl opacity-20 bg-indigo-300 rounded-full mt-[-8rem]"></div>
  </div>

  <div class="flex min-h-screen items-center justify-center px-4">
    <div class="w-full max-w-md">
      <!-- Brand -->
      <div class="mb-6 text-center">
        <div class="inline-flex items-center gap-2">
          <svg class="h-8 w-8 text-indigo-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3zm0 2.25L6 8.25v7.5l6 3.375 6-3.375v-7.5L12 5.25z"/></svg>
          <span class="text-2xl font-semibold tracking-tight">EduEbooks</span>
        </div>
        <p class="mt-1 text-sm text-slate-500">Portal eBook Pembelajaran</p>
      </div>

      <!-- Card -->
      <div class="rounded-2xl border border-slate-200/70 bg-white/80 shadow-xl backdrop-blur-sm">
        <div class="p-6 sm:p-8">
          {{ $slot }}
        </div>
      </div>

      <p class="mt-6 text-center text-xs text-slate-400">
        © {{ date('Y') }} EduEbooks. All rights reserved.
      </p>
    </div>
  </div>
</body>
</html>
