@extends('Layouts.login')

@section('content')
    <div class="login-content">
        <div class="fs-13px">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-35px position-relative">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Email</label>
                    @error('email')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-floating mb-15px position-relative">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Пароль</label>

                    @error('password')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-check mb-30px">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">
                        Запомнить меня
                    </label>
                </div>
                <div class="mb-15px">
                    <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Войти</button>
                </div>
            </form>
            <div class="row mb-15px">
                <hr class="col my-auto">
                <p class="col-auto my-auto">или</p>
                <hr class="col my-auto">
            </div>
            <a class="mb-15px text-decoration-none d-block" href="https://t.me/trip_avia_1_bot" target="_blank">
                <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px" style="background-color: #2AABEE; border-color: #2AABEE"><i class="fab fa-telegram-plane"></i>Войти через Telegram</button>
            </a>
            <div class="mb-40px pb-40px text-dark">
                Нет аккаунта? Нажмите <a href="{{ route('register') }}" class="text-primary">здесь</a>, чтобы зарегистрироваться.
            </div>
            <hr class="bg-gray-600 opacity-2" />
            <div class="text-gray-600 text-center  mb-0">
                &copy; TripAvia
            </div>
        </div>
    </div>
@endsection
