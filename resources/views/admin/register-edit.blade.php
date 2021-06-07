@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Хэрэглэгчийн эрх') }}</div>

                <div class="card-body">
                    <form method="POST" action="/role-register-update/{{$users->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('И-Мэйл хаяг:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Хэрэглэгчийн төрөл:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" type="text" name="user_type" value="{{ $users->user_type }}">
                                <option value="Админ" {{ ( $users->user_type == 'Админ') ? 'selected' : '' }}>Админ</option>
                                <option value="Нарийн бичиг" {{ ( $users->user_type == 'Нарийн бичиг') ? 'selected' : '' }}>Нарийн бичиг</option>
                                <option value="Шүүгч" {{ ( $users->user_type == 'Шүүгч') ? 'selected' : '' }}>Шүүгч</option>
                            </select>
                            </div>
                         </div>

                       <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Нууц үг:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $users->password }}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Нүүг үг баталгаажуулах:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>-->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/role-registered" class="btn">
                                    {{ __('Буцах') }}
                                </a>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Шинэчлэх') }}
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

@section('scripts')
@endsection