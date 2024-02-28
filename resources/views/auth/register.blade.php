@extends('Layouts.login')

@section('old_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="login-content">
        <div class="fs-13px">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating mb-35px position-relative">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Имя</label>
                    @error('name')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-floating mb-35px position-relative">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    <label for="emailAddress" class="d-flex align-items-center fs-13px text-gray-600">Email</label>
                    @error('email')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-floating mb-15px position-relative">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Пароль</label>

                    @error('password')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-floating mb-15px position-relative">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Подтверждение пароля</label>

                    @error('password')
                    <span class="invalid-feedback position-absolute" role="alert" style="top: -30px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="mb-15px">
                    <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Подтвердить</button>
                </div>
            </form>

            <div class="row mb-15px">
                <hr class="col my-auto">
                <p class="col-auto my-auto">или</p>
                <hr class="col my-auto">
            </div>

            <a class="mb-15px text-decoration-none d-block" href="https://t.me/trip_avia_1_bot?start=start" target="_blank">
                <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px" style="background-color: #2AABEE; border-color: #2AABEE"><i class="fab fa-telegram-plane"></i>Зарегистрироваться через Telegram</button>
            </a>
            <div class="mb-40px pb-40px text-dark">
                Уже есть аккаунт? <a href="{{ route('login') }}" class="text-primary">Войти</a>.
            </div>
            <hr class="bg-gray-600 opacity-2" />
            <div class="text-gray-600 text-center  mb-0">
                &copy; TripAvia
            </div>
        </div>
    </div>
@endsection
