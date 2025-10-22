<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <h1 class="mb-1 text-xl font-semibold">Masuk</h1>
  <p class="mb-6 text-sm text-slate-500">Silakan masuk untuk mengakses Dashboard eBook.</p>

  <form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

    <!-- Email -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" type="email" name="email"
        class="mt-1 block w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        :value="old('email')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div>
      <div class="flex items-center justify-between">
        <x-input-label for="password" :value="__('Password')" />
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 hover:text-indigo-700">Lupa password?</a>
        @endif
      </div>

      <div class="relative">
        <x-text-input id="password" type="password" name="password" required
          class="mt-1 block w-full rounded-xl border-slate-300 pr-10 focus:border-indigo-500 focus:ring-indigo-500"
          autocomplete="current-password" />
        <button type="button" id="togglePwd"
          class="absolute inset-y-0 right-2 my-auto inline-flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:text-slate-600"
          aria-label="show password">
          <svg id="eyeOn" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
              d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
            <circle cx="12" cy="12" r="3" stroke-width="1.6" />
          </svg>
          <svg id="eyeOff" class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
              d="M3 3l18 18M9.88 9.88A3 3 0 0114.12 14.12M10.73 5.08A10.61 10.61 0 0112 5.25C18 5.25 21.75 12 21.75 12a18.57 18.57 0 01-3.22 4.03M6.18 6.18A18.54 18.54 0 002.25 12s3.75 6.75 9.75 6.75a10.5 10.5 0 005.56-1.53" />
          </svg>
        </button>
      </div>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember -->
    <div class="flex items-center justify-between">
      <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
        <input id="remember_me" type="checkbox" name="remember"
               class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
        <span>Ingat saya</span>
      </label>
      <a href="{{ route('register') }}" class="text-sm text-slate-500 hover:text-slate-700">Daftar akun</a>
    </div>

    <!-- Submit -->
    <x-primary-button class="w-full justify-center rounded-xl py-2.5 text-sm">
      {{ __('Log in') }}
    </x-primary-button>
  </form>

  <script>
    const btn = document.getElementById('togglePwd');
    const input = document.getElementById('password');
    const on = document.getElementById('eyeOn'), off = document.getElementById('eyeOff');
    btn?.addEventListener('click', () => {
      const show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      on.classList.toggle('hidden', show);
      off.classList.toggle('hidden', !show);
    });
  </script>
</x-guest-layout>
