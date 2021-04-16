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
                    <form method="POST" action="/user-info-update/{{$users->id}}">
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
                                <option value="Хүндэт мэргэн" {{ ( $users->skill == 'Хүндэт мэргэн') ? 'selected' : '' }}>Хүндэт мэргэн</option>
                                <option value="МУ-ын даяар дурсах мэргэн" {{ ( $users->skill == 'МУ-ын даяар дурсах мэргэн') ? 'selected' : '' }}>МУ-ын даяар дурсах мэргэн</option>
                                <option value="МУ-ын дархан мэргэн" {{ ( $users->skill == 'МУ-ын дархан мэргэн') ? 'selected' : '' }}>МУ-ын дархан мэргэн</option>
                                <option value="МУ-ын даяан мэргэн" {{ ( $users->skill == 'МУ-ын даяан мэргэн') ? 'selected' : '' }}>МУ-ын даяан мэргэн</option>
                                <option value="МУ-ын мэргэн" {{ ( $users->skill == 'МУ-ын мэргэн') ? 'selected' : '' }}>МУ-ын мэргэн</option>
                                <option value="МУ-ын гоц харваач" {{ ( $users->skill == 'МУ-ын гоц харваач') ? 'selected' : '' }}>МУ-ын гоц харваач</option>
                                <option value="МУ-ын гарамгай харваач" {{ ( $users->skill == 'МУ-ын гарамгай харваач') ? 'selected' : '' }}>МУ-ын гарамгай харваач</option>
                                <option value="Аймгийн мэргэн СМ" {{ ( $users->skill == 'Аймгийн мэргэн СМ') ? 'selected' : '' }}>Аймгийн мэргэн СМ</option>
                                <option value="Аймгийн мэргэн СДМ" {{ ( $users->skill == 'Аймгийн мэргэн СДМ') ? 'selected' : '' }}>Аймгийн мэргэн СДМ</option>
                                <option value="Спортын мастер /СМ/" {{ ( $users->skill == 'Спортын мастер /СМ/') ? 'selected' : '' }}>Спортын мастер /СМ/</option>
                                <option value="Спортын дэд мастер /СДМ/" {{ ( $users->skill == 'Спортын дэд мастер /СДМ/') ? 'selected' : '' }}>Спортын дэд мастер /СДМ/</option>
                                <option value="Аймгийн мэргэн 1-р зэрэг" {{ ( $users->skill == 'Аймгийн мэргэн 1-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 1-р зэрэг</option>
                                <option value="Аймгийн мэргэн 2-р зэрэг" {{ ( $users->skill == 'Аймгийн мэргэн 2-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 2-р зэрэг</option>
                                <option value="Аймгийн мэргэн 3-р зэрэг" {{ ( $users->skill == 'Аймгийн мэргэн 3-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 3-р зэрэг</option>
                                <option value="Аймгийн мэргэн" {{ ( $users->skill == 'Аймгийн мэргэн') ? 'selected' : '' }}>Аймгийн мэргэн</option>
                                <option value="1-р зэрэг" {{ ( $users->skill == '1-р зэрэг') ? 'selected' : '' }}>1-р зэрэг</option>
                                <option value="2-р зэрэг" {{ ( $users->skill == '2-р зэрэг') ? 'selected' : '' }}>2-р зэрэг</option>
                                <option value="3-р зэрэг" {{ ( $users->skill == '3-р зэрэг') ? 'selected' : '' }}>3-р зэрэг</option>
                                <option value="Залуу харваач" {{ ( $users->skill == 'Залуу харваач') ? 'selected' : '' }}>Залуу харваач</option>
                            </select>
                            </div>
                         </div>


                        <div class="form-group row">
                            <label for="undsen_zahirgaa" class="col-md-4 col-form-label text-md-right">{{ __('Үндсэн захиргаа:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="undsen_zahirgaa" type="text" name="undsen_zahirgaa" value="{{ $users->undsen_zahirgaa }}" required autofocus autocomplete="undsen_zahirgaa">
                                <option value="Улаанбаатар" {{ ( $users->undsen_zahirgaa == 'Улаанбаатар') ? 'selected' : '' }}>Улаанбаатар</option>
                                <option value="Архангай" {{ ( $users->undsen_zahirgaa == 'Архангай') ? 'selected' : '' }}>Архангай</option>
                                <option value="Баян-Өлгий" {{ ( $users->undsen_zahirgaa == 'Баян-Өлгий') ? 'selected' : '' }}>Баян-Өлгий</option>
                                <option value="Баянхонгор" {{ ( $users->undsen_zahirgaa == 'Баянхонгор') ? 'selected' : '' }}>Баянхонгор</option>
                                <option value="Булган" {{ ( $users->undsen_zahirgaa == 'Булган') ? 'selected' : '' }}>Булган</option>
                                <option value="Говь-Алтай" {{ ( $users->undsen_zahirgaa == 'Говь-Алтай') ? 'selected' : '' }}>Говь-Алтай</option>
                                <option value="Говьсүмбэр" {{ ( $users->undsen_zahirgaa == 'Говьсүмбэр') ? 'selected' : '' }}>Говьсүмбэр</option>
                                <option value="Дархан-Уул" {{ ( $users->undsen_zahirgaa == 'Дархан-Уул') ? 'selected' : '' }}>Дархан-Уул</option>
                                <option value="Дорноговь" {{ ( $users->undsen_zahirgaa == 'Дорноговь') ? 'selected' : '' }}>Дорноговь</option>
                                <option value="Дорнод" {{ ( $users->undsen_zahirgaa == 'Дорнод') ? 'selected' : '' }}>Дорнод</option>
                                <option value="Дундговь" {{ ( $users->undsen_zahirgaa == 'Дундговь') ? 'selected' : '' }}>Дундговь</option>
                                <option value="Завхан" {{ ( $users->undsen_zahirgaa == 'Завхан') ? 'selected' : '' }}>Завхан</option>
                                <option value="Орхон" {{ ( $users->undsen_zahirgaa == 'Орхон') ? 'selected' : '' }}>Орхон</option>
                                <option value="Өвөрхангай" {{ ( $users->undsen_zahirgaa == 'Өвөрхангай') ? 'selected' : '' }}>Өвөрхангай</option>
                                <option value="Өмнөговь" {{ ( $users->undsen_zahirgaa == 'Өмнөговь') ? 'selected' : '' }}>Өмнөговь</option>
                                <option value="Сүхбаатар" {{ ( $users->undsen_zahirgaa == 'Сүхбаатар') ? 'selected' : '' }}>Сүхбаатар</option>
                                <option value="Сэлэнгэ" {{ ( $users->undsen_zahirgaa == 'Сэлэнгэ') ? 'selected' : '' }}>Сэлэнгэ</option>
                                <option value="Төв" {{ ( $users->undsen_zahirgaa == 'Төв') ? 'selected' : '' }}>Төв</option>
                                <option value="Увс" {{ ( $users->undsen_zahirgaa == 'Увс') ? 'selected' : '' }}>Увс</option>
                                <option value="Ховд" {{ ( $users->undsen_zahirgaa == 'Ховд') ? 'selected' : '' }}>Ховд</option>
                                <option value="Хөвсгөл" {{ ( $users->undsen_zahirgaa == 'Хөвсгөл') ? 'selected' : '' }}>Хөвсгөл</option>
                                <option value="Хэнтий" {{ ( $users->undsen_zahirgaa == 'Хэнтий') ? 'selected' : '' }}>Хэнтий</option>
                            </select>
                            </div>
                         </div>

                         <div class="form-group row">
                            <label for="club" class="col-md-4 col-form-label text-md-right">{{ __('Харъяа клуб:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="club" type="text" name="club" value="{{ $users->club }}" >
                                <option value="Алдар спорт хороо" {{ ( $users->club == 'Алдар спорт хороо') ? 'selected' : '' }}>Алдар спорт хороо</option>
                                <option value="Есүхэй мэргэн" {{ ( $users->club == 'Есүхэй мэргэн') ? 'selected' : '' }}>Есүхэй мэргэн</option>
                                <option value="Хилчин спорт хороо" {{ ( $users->club== 'Хилчин спорт хороо') ? 'selected' : '' }}>Хилчин спорт хороо</option>
                                <option value="Мэргэн зэв" {{ ( $users->club == 'Мэргэн зэв') ? 'selected' : '' }}>Мэргэн зэв</option>
                                <option value="Эрхий мэргэн" {{ ( $users->club == 'Эрхий мэргэн') ? 'selected' : '' }}>Эрхий мэргэн</option>
                                <option value="Архангай" {{ ( $users->club == 'Архангай') ? 'selected' : '' }}>Архангай</option>
                                <option value="Баян-Өлгий" {{ ( $users->club == 'Баян-Өлгий') ? 'selected' : '' }}>Баян-Өлгий</option>
                                <option value="Баянхонгор" {{ ( $users->club == 'Баянхонгор') ? 'selected' : '' }}>Баянхонгор</option>
                                <option value="Булган" {{ ( $users->club == 'Булган') ? 'selected' : '' }}>Булган</option>
                                <option value="Говь-Алтай" {{ ( $users->club == 'Говь-Алтай') ? 'selected' : '' }}>Говь-Алтай</option>
                                <option value="Говьсүмбэр" {{ ( $users->club == 'Говьсүмбэр') ? 'selected' : '' }}>Говьсүмбэр</option>
                                <option value="Дархан-Уул" {{ ( $users->club == 'Дархан-Уул') ? 'selected' : '' }}>Дархан-Уул</option>
                                <option value="Дорноговь" {{ ( $users->club == 'Дорноговь') ? 'selected' : '' }}>Дорноговь</option>
                                <option value="Дорнод" {{ ( $users->club == 'Дорнод') ? 'selected' : '' }}>Дорнод</option>
                                <option value="Дундговь" {{ ( $users->club == 'Дундговь') ? 'selected' : '' }}>Дундговь</option>
                                <option value="Завхан" {{ ( $users->club == 'Завхан') ? 'selected' : '' }}>Завхан</option>
                                <option value="Орхон" {{ ( $users->club == 'Орхон') ? 'selected' : '' }}>Орхон</option>
                                <option value="Өвөрхангай" {{ ( $users->club == 'Өвөрхангай') ? 'selected' : '' }}>Өвөрхангай</option>
                                <option value="Өмнөговь" {{ ( $users->club == 'Өмнөговь') ? 'selected' : '' }}>Өмнөговь</option>
                                <option value="Сүхбаатар" {{ ( $users->club == 'Сүхбаатар') ? 'selected' : '' }}>Сүхбаатар</option>
                                <option value="Сэлэнгэ" {{ ( $users->club == 'Сэлэнгэ') ? 'selected' : '' }}>Сэлэнгэ</option>
                                <option value="Төв" {{ ( $users->club == 'Төв') ? 'selected' : '' }}>Төв</option>
                                <option value="Увс" {{ ( $users->club == 'Увс') ? 'selected' : '' }}>Увс</option>
                                <option value="Ховд" {{ ( $users->club == 'Ховд') ? 'selected' : '' }}>Ховд</option>
                                <option value="Хөвсгөл" {{ ( $users->club == 'Хөвсгөл') ? 'selected' : '' }}>Хөвсгөл</option>
                                <option value="Хэнтий}" {{ ( $users->club == 'Хэнтий') ? 'selected' : '' }}>Хэнтий</option>-->
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
                                <a href="/users-info" class="btn">
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