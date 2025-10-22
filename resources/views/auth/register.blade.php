<x-guest-layout>
  <h1 class="mb-1 text-xl font-semibold">Daftar Akun</h1>
  <p class="mb-6 text-sm text-slate-500">Buat akun untuk mengakses Dashboard eBook.</p>

  <form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Nama')" />
      <x-text-input id="name" type="text" name="name"
        class="mt-1 block w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email -->
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" type="email" name="email"
        class="mt-1 block w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        :value="old('email')" required autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div>
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" type="password" name="password" required
        class="mt-1 block w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div>
      <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
      <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
        class="mt-1 block w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
        autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between">
      <a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-slate-700">Sudah punya akun? Masuk</a>
      <x-primary-button class="rounded-xl px-5 py-2.5">
        {{ __('Daftar') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
