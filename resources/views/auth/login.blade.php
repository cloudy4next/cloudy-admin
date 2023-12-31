
<x-layouts.login-layout>
    <x-layouts.auth-card>
        <x-slot name="logo">
            <img
            src="{{asset('img/cloudy4next.ico')}}"
            class="img-control"
            style="width: 120px; height: 120px"
            alt="cloudy4next"
          />
        </x-slot>

        <form method="POST" action="{{ route('login.check') }}">
            @csrf
            <div class="input-group mb-3">
                <input class="form-control mt-1" type="email" name="email" :value="old('email')" placeholder="Enter Email"
                required autofocus>
                <span class="input-group-text">
                    <i class="fa fa-envelope"> </i>
                </span>
                <x-utils.error :messages="$errors->get('email')" class="mt-2" />

            </div>

            <div class="input-group mb-3">
                <input class="form-control" type="password" name="password" placeholder="Enter Password" required
                autocomplete="current-password">
                <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                </span>
                <x-utils.error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="d-grid mb-3">
                <button class="btn btn-primary w-100" type="submit">Sign In</button>
            </div>
        </form>

    </x-layouts.auth-card>
</x-layouts.login-layout>
