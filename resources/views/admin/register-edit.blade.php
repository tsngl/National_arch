@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Хэрэглэгчийн мэдээлэл') }}</div>

                <div class="card-body">
                    <form method="POST" action="/role-register-update/{{$users->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Овог:') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $users->last_name }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Нэр:') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $users->first_name }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Цол зэрэг:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="skill" type="text" name="skill" value="{{ $users->skill }}" required autofocus autocomplete="skill">
                                <option value="Хүндэт мэргэн" {{ ( $users->user_type == 'Хүндэт мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын даяар дурсах мэргэн" {{ ( $users->user_type == 'МУ-ын даяар дурсах мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын дархан мэргэн" {{ ( $users->user_type == 'МУ-ын дархан мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын даяан мэргэн" {{ ( $users->user_type == 'МУ-ын даяан мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын мэргэн" {{ ( $users->user_type == 'МУ-ын мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын гоц харваач" {{ ( $users->user_type == 'МУ-ын гоц харваач') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="МУ-ын гарамгай харваач" {{ ( $users->user_type == 'МУ-ын гарамгай харваач') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн СМ" {{ ( $users->user_type == 'Аймгийн мэргэн СМ') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн СДМ" {{ ( $users->user_type == 'Аймгийн мэргэн СДМ') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Спортын мастер /СМ/" {{ ( $users->user_type == 'Спортын мастер /СМ/') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Спортын дэд мастер /СДМ/" {{ ( $users->user_type == 'Спортын дэд мастер /СДМ/') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн 1-р зэрэг" {{ ( $users->user_type == 'Аймгийн мэргэн 1-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн 2-р зэрэг" {{ ( $users->user_type == 'Аймгийн мэргэн 2-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн 3-р зэрэг" {{ ( $users->user_type == 'Аймгийн мэргэн 3-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Аймгийн мэргэн" {{ ( $users->user_type == 'Аймгийн мэргэн') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="1-р зэрэг" {{ ( $users->user_type == '1-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="2-р зэрэг" {{ ( $users->user_type == '2-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="3-р зэрэг" {{ ( $users->user_type == '3-р зэрэг') ? 'selected' : '' }}>{{ $users->skill }}</option>
                                <option value="Залуу харваач" {{ ( $users->user_type == 'Залуу харваач') ? 'selected' : '' }}>{{ $users->skill }}</option>
                            </select>
                            </div>
                         </div>


                        <div class="form-group row">
                            <label for="undsen_zahirgaa" class="col-md-4 col-form-label text-md-right">{{ __('Үндсэн захиргаа:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="undsen_zahirgaa" type="text" name="undsen_zahirgaa" value="{{ $users->undsen_zahirgaa }}" required autofocus autocomplete="undsen_zahirgaa">
                                <option value="Улаанбаатар" {{ ( $users->user_type == 'Улаанбаатар') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Архангай" {{ ( $users->user_type == 'Архангай') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Баян-Өлгий" {{ ( $users->user_type == 'Баян-Өлгий') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Баянхонгор" {{ ( $users->user_type == 'Баянхонгор') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Булган" {{ ( $users->user_type == 'Булган') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Говь-Алтай" {{ ( $users->user_type == 'Говь-Алтай') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Говьсүмбэр" {{ ( $users->user_type == 'Говьсүмбэр') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Дархан-Уул" {{ ( $users->user_type == 'Дархан-Уул') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Дорноговь" {{ ( $users->user_type == 'Дорноговь') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Дорнод" {{ ( $users->user_type == 'Дорнод') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Дундговь" {{ ( $users->user_type == 'Дундговь') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Завхан" {{ ( $users->user_type == 'Завхан') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Орхон" {{ ( $users->user_type == 'Орхон') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Өвөрхангай" {{ ( $users->user_type == 'Өвөрхангай') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Өмнөговь" {{ ( $users->user_type == 'Өмнөговь') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Сүхбаатар" {{ ( $users->user_type == 'Сүхбаатар') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Сэлэнгэ" {{ ( $users->user_type == 'Сэлэнгэ') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Төв" {{ ( $users->user_type == 'Төв') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Увс" {{ ( $users->user_type == 'Увс') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Ховд" {{ ( $users->user_type == 'Ховд') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Хөвсгөл" {{ ( $users->user_type == 'Хөвсгөл') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                                <option value="Хэнтий" {{ ( $users->user_type == 'Хэнтий') ? 'selected' : '' }}>{{ $users->undsen_zahirgaa }}</option>
                            </select>
                            </div>
                         </div>

                         <div class="form-group row">
                            <label for="club" class="col-md-4 col-form-label text-md-right">{{ __('Харъяа клуб:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="club" type="text" name="club" value="{{ $users->club }}" >
                                <option value="Алдар спорт хороо" {{ ( $users->user_type == 'Алдар спорт хороо') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Есүхэй мэргэн" {{ ( $users->user_type == 'Есүхэй мэргэн') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Хилчин спорт хороо" {{ ( $users->user_type == 'Хилчин спорт хороо') ? 'selected' : '' }}>{{ $users->club }}о</option>
                                <option value="Мэргэн зэв" {{ ( $users->user_type == 'Мэргэн зэв') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Эрхий мэргэн" {{ ( $users->user_type == 'Эрхий мэргэн') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Архангай" {{ ( $users->user_type == 'Архангай') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Баян-Өлгий" {{ ( $users->user_type == 'Баян-Өлгий') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Баянхонгор" {{ ( $users->user_type == 'Баянхонгор') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Булган" {{ ( $users->user_type == 'Булган') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Говь-Алтай" {{ ( $users->user_type == 'Говь-Алтай') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Говьсүмбэр" {{ ( $users->user_type == 'Говьсүмбэр') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Дархан-Уул" {{ ( $users->user_type == 'Дархан-Уул') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Дорноговь" {{ ( $users->user_type == 'Дорноговь') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Дорнод" {{ ( $users->user_type == 'Дорнод') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Дундговь" {{ ( $users->user_type == 'Дундговь') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Завхан" {{ ( $users->user_type == 'Завхан') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Орхон" {{ ( $users->user_type == 'Орхон') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Өвөрханга" {{ ( $users->user_type == 'Өвөрханга') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Өмнөговь" {{ ( $users->user_type == 'Өмнөговь') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Сүхбаатар" {{ ( $users->user_type == 'Сүхбаатар') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Сэлэнгэ" {{ ( $users->user_type == 'Сэлэнгэ') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Төв" {{ ( $users->user_type == 'Төв') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Увс" {{ ( $users->user_type == 'Увс') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Ховд" {{ ( $users->user_type == 'Ховд') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Хөвсгөл" {{ ( $users->user_type == 'Хөвсгөл') ? 'selected' : '' }}>{{ $users->club }}</option>
                                <option value="Хэнтий}" {{ ( $users->user_type == 'Хэнтий') ? 'selected' : '' }}>{{ $users->club }}</option>-->
                            </select>
                            </div>
                         </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Утасны дугаар:') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus>

                                @error('phone')
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
                                <option value="admin" {{ ( $users->user_type == 'admin') ? 'selected' : '' }}>Админ</option>
                                <option value="assistant" {{ ( $users->user_type == 'assistant') ? 'selected' : '' }}>Нарийн бичиг</option>
                                <option value="" {{ ( $users->user_type == '') ? 'selected' : '' }}>Шүүгч</option>
                            </select>
                            </div>
                         </div>

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

                       <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Нууц үг:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <a href="/role-registered" class="btn btn-primary">
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