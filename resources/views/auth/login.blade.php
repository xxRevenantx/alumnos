<x-guest-layout>
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
      <img src="https://images.pexels.com/photos/5212345/pexels-photo-5212345.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <!-- Right: Login Form -->
    <div class= "lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">


        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession




      <h1 class="text-4xl text-center my-5">Gestor<span class="font-bold">SYS</span></h1>
      <h1 class="text-2xl font-semibold mb-4">Iniciar sesión</h1>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Username Input -->
        <div class="mb-4">
            <x-label for="email">Correo</x-label>
            <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
            @error('email')
            <span class="text-red-500">{{ $message }}</span>
            @enderror


        </div>
        <!-- Password Input -->
        <div class="mb-4">
            <x-label for="password">Password</x-label>
            <x-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password" name="password"  autocomplete="current-password" />
            @error('email')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

        </div>
        <!-- Remember Me Checkbox -->
        <div class="mb-4 flex items-center">
          <input type="checkbox" id="remember" name="remember" class="text-orange-500">
          <label for="remember" class="text-gray-900 ml-2">{{ __('Remember me') }}</label>
        </div>

        <!-- Login Button -->
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-md py-2 px-4 w-full">Iniciar sesión</button>
      </form>

    </div>
    </div>
    </x-guest-layout>
