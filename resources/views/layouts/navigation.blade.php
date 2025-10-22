<nav x-data="{ open:false }" class="bg-base-100 border-b border-base-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center gap-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
          <svg class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3zm0 2.25L6 8.25v7.5l6 3.375 6-3.375v-7.5L12 5.25z"/>
          </svg>
          <span class="hidden sm:inline text-xl font-semibold tracking-tight">EduEbooks</span>
        </a>
        <div class="hidden sm:flex">
          <x-nav-link
            :href="route('dashboard')"
            :active="request()->routeIs('dashboard')"
            class="text-slate-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-300"
          >
            {{ __('Dashboard') }}
          </x-nav-link>
        </div>
      </div>

      <div class="hidden sm:flex items-center gap-3">
        @if (Route::has('profile.edit'))
          <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-3 px-3 py-2 text-sm rounded-md hover:bg-base-200 transition">
            <span class="hidden md:flex flex-col items-end leading-tight">
              <span class="font-medium">{{ Auth::user()->name }}</span>
              <span class="text-xs opacity-70">Online</span>
            </span>
            <span class="relative inline-flex h-9 w-9 items-center justify-center rounded-full bg-base-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0v.75H4.5v-.75z"/>
              </svg>
              <span class="absolute -right-0 -bottom-0 h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-base-100"></span>
            </span>
          </a>
        @else
          <div class="inline-flex items-center gap-3 px-3 py-2 text-sm rounded-md">
            <span class="hidden md:flex flex-col items-end leading-tight">
              <span class="font-medium">{{ Auth::user()->name }}</span>
              <span class="text-xs opacity-70">Online</span>
            </span>
            <span class="relative inline-flex h-9 w-9 items-center justify-center rounded-full bg-base-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0v.75H4.5v-.75z"/>
              </svg>
              <span class="absolute -right-0 -bottom-0 h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-base-100"></span>
            </span>
          </div>
        @endif

        <div class="relative" x-data="{ menu:false }" @click.outside="menu=false" @keydown.escape.window="menu=false">
          <button type="button" @click="menu = !menu" :aria-expanded="menu" aria-haspopup="true" class="inline-flex h-9 w-9 items-center justify-center rounded-md hover:bg-base-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" viewBox="0 0 20 20" fill="currentColor">
              <path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"/>
            </svg>
          </button>
          <div x-cloak x-show="menu" x-transition.origin.top.right class="absolute right-0 mt-2 w-56 rounded-xl border border-base-200 bg-base-100 shadow-md z-50">
            <div class="py-1">
              @if (Route::has('profile.edit'))
                <a href="{{ route('profile.edit') }}" @click="menu=false" class="flex items-center gap-2 px-3 py-2 text-sm hover:bg-base-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0v.75H4.5v-.75z"/>
                  </svg>
                  Profile
                </a>
              @endif
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" @click="menu=false" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 8.25L15.75 12 12 15.75M15.75 12H3"/>
                  </svg>
                  Keluar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-base-200 transition">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-base-200">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
      </x-responsive-nav-link>
    </div>
    <div class="pt-4 pb-1 border-t border-base-200">
      <div class="px-4">
        <div class="font-medium text-base">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm opacity-70">{{ Auth::user()->email }}</div>
      </div>
      <div class="mt-3 space-y-1">
        @if (Route::has('profile.edit'))
          <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600">
            Keluar
          </x-responsive-nav-link>
        </form>
      </div>
    </div>
  </div>
</nav>
