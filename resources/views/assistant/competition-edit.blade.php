@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('logo')
<img src="/assets/img/log.png"/>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Тэмцээн') }}</div>

                <div class="card-body">
                    <form method="POST" action="/comp-update/{{$competition->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="competition_name" class="col-md-4 col-form-label text-md-right">{{ __('Тэмцээний нэр:') }}</label>

                            <div class="col-md-6">
                                <input id="competition_name" type="text" class="form-control @error('competition_name') is-invalid @enderror" name="competition_name" value="{{ $competition->competition_name }}" required autocomplete="competition_name" autofocus>

                                @error('competition_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Нэр:') }}</label>

                            <div class="col-md-6">
                                <input id="rank" type="text" class="form-control @error('rank') is-invalid @enderror" name="rank" value="{{ $competition->rank }}" required autocomplete="rank" autofocus>

                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Төлөв:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" type="text" name="status" value="{{ $competition->status }}">
                                <option value="1" {{ ( $competition->status  == '1') ? 'selected' : '' }}>1</option>
                                <option value="0" {{ ( $competition->status  == '0') ? 'selected' : '' }}>0</option>
                            </select>
                            </div>
                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/competition" class="btn">
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