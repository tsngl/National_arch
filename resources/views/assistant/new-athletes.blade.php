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
                <div class="card-header">{{ __('Тамирчин нэмэх') }}</div>

                <div class="card-body">
                    <form method="POST" action="/save-created">
                        @csrf

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Овог:') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Хүйс:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="gender" type="text" name="gender" value="old('gender')" required autofocus autocomplete="gender">
                                <option>Эр</option>
                                <option>Эм</option>
                            </select>
                            </div>
                         </div>

                        <div class="form-group row">
                            <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Цол зэрэг:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="skill" type="text" name="skill" value="old('skill')" required autofocus autocomplete="skill">
                                <option>Хүндэт мэргэн</option>
                                <option>МУ-ын даяар дурсах мэргэн</option>
                                <option>МУ-ын дархан мэргэн</option>
                                <option>МУ-ын даяан мэргэн</option>
                                <option>МУ-ын мэргэн</option>
                                <option>МУ-ын гоц харваач</option>
                                <option>МУ-ын гарамгай харваач</option>
                                <option>Аймгийн мэргэн СМ</option>
                                <option>Аймгийн мэргэн СДМ</option>
                                <option>Спортын мастер /СМ/</option>
                                <option>Спортын дэд мастер /СДМ/</option>
                                <option>Аймгийн мэргэн 1-р зэрэг</option>
                                <option>Аймгийн мэргэн 2-р зэрэг</option>
                                <option>Аймгийн мэргэн 3-р зэрэг</option>
                                <option>Аймгийн мэргэн</option>
                                <option>1-р зэрэг</option>
                                <option>2-р зэрэг</option>
                                <option>3-р зэрэг</option>
                                <option>Залуу харваач</option>
                            </select>
                            </div>
                         </div>


                        <div class="form-group row">
                            <label for="undsen_zahirgaa" class="col-md-4 col-form-label text-md-right">{{ __('Үндсэн захиргаа:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="undsen_zahirgaa" type="text" name="undsen_zahirgaa" value="old('undsen_zahirgaa')" required autofocus autocomplete="undsen_zahirgaa">
                                <option>Улаанбаатар</option>
                                <option>Архангай</option>
                                <option>Баян-Өлгий</option>
                                <option>Баянхонгор</option>
                                <option>Булган</option>
                                <option>Говь-Алтай</option>
                                <option>Говьсүмбэр</option>
                                <option>Дархан-Уул</option>
                                <option>Дорноговь</option>
                                <option>Дорнод</option>
                                <option>Дундговь</option>
                                <option>Завхан</option>
                                <option>Орхон</option>
                                <option>Өвөрхангай</option>
                                <option>Өмнөговь</option>
                                <option>Сүхбаатар</option>
                                <option>Сэлэнгэ</option>
                                <option>Төв</option>
                                <option>Увс</option>
                                <option>Ховд</option>
                                <option>Хөвсгөл</option>
                                <option>Хэнтий</option>
                            </select>
                            </div>
                         </div>

                         <div class="form-group row">
                            <label for="club" class="col-md-4 col-form-label text-md-right">{{ __('Харъяа клуб:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="club" type="text" name="club" value="old('club')" required autofocus autocomplete="club">
                                <option>Алдар спорт хороо</option>
                                <option>Есүхэй мэргэн</option>
                                <option>Хилчин спорт хороо</option>
                                <option>Мэргэн зэв</option>
                                <option>Архангай</option>
                                <option>Баян-Өлгий</option>
                                <option>Баянхонгор</option>
                                <option>Булган</option>
                                <option>Говь-Алтай</option>
                                <option>Говьсүмбэр</option>
                                <option>Дархан-Уул</option>
                                <option>Дорноговь</option>
                                <option>Дорнод</option>
                                <option>Дундговь</option>
                                <option>Завхан</option>
                                <option>Орхон</option>
                                <option>Өвөрхангай</option>
                                <option>Өмнөговь</option>
                                <option>Сүхбаатар</option>
                                <option>Сэлэнгэ</option>
                                <option>Төв</option>
                                <option>Увс</option>
                                <option>Ховд</option>
                                <option>Хөвсгөл</option>
                                <option>Хэнтий</option>
                            </select>
                            </div>
                         </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Утасны дугаар:') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/athletes-info" class="btn">
                                    {{ __('Буцах') }}
                                </a>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Хадгалах') }}
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