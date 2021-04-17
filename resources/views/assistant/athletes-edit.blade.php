@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Тамирчны мэдээлэл') }}</div>

                <div class="card-body">
                    <form method="POST" action="/athletes-update/{{$athletes->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Овог:') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $athletes->last_name }}" required autocomplete="last_name" autofocus>

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
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $athletes->first_name }}" required autocomplete="first_name" autofocus>

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
                            <select class="form-control" type="text" name="gender" value="{{ $athletes->gender }}">
                                <option value="Эр" {{ ( $athletes->gender == 'Эр') ? 'selected' : '' }}>Эр</option>
                                <option value="Эм" {{ ( $athletes->gender == 'Эм') ? 'selected' : '' }}>Эм</option>
                            </select>
                            </div>
                         </div>

                        <div class="form-group row">
                            <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Цол зэрэг:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="skill" type="text" name="skill" value="{{ $athletes->skill }}" required autofocus autocomplete="skill">
                                <option value="Хүндэт мэргэн" {{ ( $athletes->skill == 'Хүндэт мэргэн') ? 'selected' : '' }}>Хүндэт мэргэн</option>
                                <option value="МУ-ын даяар дурсах мэргэн" {{ ( $athletes->skill == 'МУ-ын даяар дурсах мэргэн') ? 'selected' : '' }}>МУ-ын даяар дурсах мэргэн</option>
                                <option value="МУ-ын дархан мэргэн" {{ ( $athletes->skill == 'МУ-ын дархан мэргэн') ? 'selected' : '' }}>МУ-ын дархан мэргэн</option>
                                <option value="МУ-ын даяан мэргэн" {{ ( $athletes->skill == 'МУ-ын даяан мэргэн') ? 'selected' : '' }}>МУ-ын даяан мэргэн</option>
                                <option value="МУ-ын мэргэн" {{ ( $athletes->skill == 'МУ-ын мэргэн') ? 'selected' : '' }}>МУ-ын мэргэн</option>
                                <option value="МУ-ын гоц харваач" {{ ( $athletes->skill == 'МУ-ын гоц харваач') ? 'selected' : '' }}>МУ-ын гоц харваач</option>
                                <option value="МУ-ын гарамгай харваач" {{ ( $athletes->skill == 'МУ-ын гарамгай харваач') ? 'selected' : '' }}>МУ-ын гарамгай харваач</option>
                                <option value="Аймгийн мэргэн СМ" {{ ( $athletes->skill == 'Аймгийн мэргэн СМ') ? 'selected' : '' }}>Аймгийн мэргэн СМ</option>
                                <option value="Аймгийн мэргэн СДМ" {{ ( $athletes->skill == 'Аймгийн мэргэн СДМ') ? 'selected' : '' }}>Аймгийн мэргэн СДМ</option>
                                <option value="Спортын мастер /СМ/" {{ ( $athletes->skill == 'Спортын мастер /СМ/') ? 'selected' : '' }}>Спортын мастер /СМ/</option>
                                <option value="Спортын дэд мастер /СДМ/" {{ ( $athletes->skill == 'Спортын дэд мастер /СДМ/') ? 'selected' : '' }}>Спортын дэд мастер /СДМ/</option>
                                <option value="Аймгийн мэргэн 1-р зэрэг" {{ ( $athletes->skill == 'Аймгийн мэргэн 1-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 1-р зэрэг</option>
                                <option value="Аймгийн мэргэн 2-р зэрэг" {{ ( $athletes->skill == 'Аймгийн мэргэн 2-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 2-р зэрэг</option>
                                <option value="Аймгийн мэргэн 3-р зэрэг" {{ ( $athletes->skill == 'Аймгийн мэргэн 3-р зэрэг') ? 'selected' : '' }}>Аймгийн мэргэн 3-р зэрэг</option>
                                <option value="Аймгийн мэргэн" {{ ( $athletes->skill == 'Аймгийн мэргэн') ? 'selected' : '' }}>Аймгийн мэргэн</option>
                                <option value="1-р зэрэг" {{ ( $athletes->skill == '1-р зэрэг') ? 'selected' : '' }}>1-р зэрэг</option>
                                <option value="2-р зэрэг" {{ ( $athletes->skill == '2-р зэрэг') ? 'selected' : '' }}>2-р зэрэг</option>
                                <option value="3-р зэрэг" {{ ( $athletes->skill == '3-р зэрэг') ? 'selected' : '' }}>3-р зэрэг</option>
                                <option value="Залуу харваач" {{ ( $athletes->skill == 'Залуу харваач') ? 'selected' : '' }}>Залуу харваач</option>
                            </select>
                            </div>
                         </div>


                        <div class="form-group row">
                            <label for="undsen_zahirgaa" class="col-md-4 col-form-label text-md-right">{{ __('Үндсэн захиргаа:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="undsen_zahirgaa" type="text" name="undsen_zahirgaa" value="{{ $athletes->undsen_zahirgaa }}" required autofocus autocomplete="undsen_zahirgaa">
                                <option value="Улаанбаатар" {{ ( $athletes->undsen_zahirgaa == 'Улаанбаатар') ? 'selected' : '' }}>Улаанбаатар</option>
                                <option value="Архангай" {{ ( $athletes->undsen_zahirgaa == 'Архангай') ? 'selected' : '' }}>Архангай</option>
                                <option value="Баян-Өлгий" {{ ( $athletes->undsen_zahirgaa == 'Баян-Өлгий') ? 'selected' : '' }}>Баян-Өлгий</option>
                                <option value="Баянхонгор" {{ ( $athletes->undsen_zahirgaa == 'Баянхонгор') ? 'selected' : '' }}>Баянхонгор</option>
                                <option value="Булган" {{ ( $athletes->undsen_zahirgaa == 'Булган') ? 'selected' : '' }}>Булган</option>
                                <option value="Говь-Алтай" {{ ( $athletes->undsen_zahirgaa == 'Говь-Алтай') ? 'selected' : '' }}>Говь-Алтай</option>
                                <option value="Говьсүмбэр" {{ ( $athletes->undsen_zahirgaa == 'Говьсүмбэр') ? 'selected' : '' }}>Говьсүмбэр</option>
                                <option value="Дархан-Уул" {{ ( $athletes->undsen_zahirgaa == 'Дархан-Уул') ? 'selected' : '' }}>Дархан-Уул</option>
                                <option value="Дорноговь" {{ ( $athletes->undsen_zahirgaa == 'Дорноговь') ? 'selected' : '' }}>Дорноговь</option>
                                <option value="Дорнод" {{ ( $athletes->undsen_zahirgaa == 'Дорнод') ? 'selected' : '' }}>Дорнод</option>
                                <option value="Дундговь" {{ ( $athletes->undsen_zahirgaa == 'Дундговь') ? 'selected' : '' }}>Дундговь</option>
                                <option value="Завхан" {{ ( $athletes->undsen_zahirgaa == 'Завхан') ? 'selected' : '' }}>Завхан</option>
                                <option value="Орхон" {{ ( $athletes->undsen_zahirgaa == 'Орхон') ? 'selected' : '' }}>Орхон</option>
                                <option value="Өвөрхангай" {{ ( $athletes->undsen_zahirgaa == 'Өвөрхангай') ? 'selected' : '' }}>Өвөрхангай</option>
                                <option value="Өмнөговь" {{ ( $athletes->undsen_zahirgaa == 'Өмнөговь') ? 'selected' : '' }}>Өмнөговь</option>
                                <option value="Сүхбаатар" {{ ( $athletes->undsen_zahirgaa == 'Сүхбаатар') ? 'selected' : '' }}>Сүхбаатар</option>
                                <option value="Сэлэнгэ" {{ ( $athletes->undsen_zahirgaa == 'Сэлэнгэ') ? 'selected' : '' }}>Сэлэнгэ</option>
                                <option value="Төв" {{ ( $athletes->undsen_zahirgaa == 'Төв') ? 'selected' : '' }}>Төв</option>
                                <option value="Увс" {{ ( $athletes->undsen_zahirgaa == 'Увс') ? 'selected' : '' }}>Увс</option>
                                <option value="Ховд" {{ ( $athletes->undsen_zahirgaa == 'Ховд') ? 'selected' : '' }}>Ховд</option>
                                <option value="Хөвсгөл" {{ ( $athletes->undsen_zahirgaa == 'Хөвсгөл') ? 'selected' : '' }}>Хөвсгөл</option>
                                <option value="Хэнтий" {{ ( $athletes->undsen_zahirgaa == 'Хэнтий') ? 'selected' : '' }}>Хэнтий</option>
                            </select>
                            </div>
                         </div>

                         <div class="form-group row">
                            <label for="club" class="col-md-4 col-form-label text-md-right">{{ __('Харъяа клуб:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="club" type="text" name="club" value="{{ $athletes->club }}" >
                                <option value="Алдар спорт хороо" {{ ( $athletes->club == 'Алдар спорт хороо') ? 'selected' : '' }}>Алдар спорт хороо</option>
                                <option value="Есүхэй мэргэн" {{ ( $athletes->club == 'Есүхэй мэргэн') ? 'selected' : '' }}>Есүхэй мэргэн</option>
                                <option value="Хилчин спорт хороо" {{ ( $athletes->club== 'Хилчин спорт хороо') ? 'selected' : '' }}>Хилчин спорт хороо</option>
                                <option value="Мэргэн зэв" {{ ( $athletes->club == 'Мэргэн зэв') ? 'selected' : '' }}>Мэргэн зэв</option>
                                <option value="Эрхий мэргэн" {{ ( $athletes->club == 'Эрхий мэргэн') ? 'selected' : '' }}>Эрхий мэргэн</option>
                                <option value="Архангай" {{ ( $athletes->club == 'Архангай') ? 'selected' : '' }}>Архангай</option>
                                <option value="Баян-Өлгий" {{ ( $athletes->club == 'Баян-Өлгий') ? 'selected' : '' }}>Баян-Өлгий</option>
                                <option value="Баянхонгор" {{ ( $athletes->club == 'Баянхонгор') ? 'selected' : '' }}>Баянхонгор</option>
                                <option value="Булган" {{ ( $athletes->club == 'Булган') ? 'selected' : '' }}>Булган</option>
                                <option value="Говь-Алтай" {{ ( $athletes->club == 'Говь-Алтай') ? 'selected' : '' }}>Говь-Алтай</option>
                                <option value="Говьсүмбэр" {{ ( $athletes->club == 'Говьсүмбэр') ? 'selected' : '' }}>Говьсүмбэр</option>
                                <option value="Дархан-Уул" {{ ( $athletes->club == 'Дархан-Уул') ? 'selected' : '' }}>Дархан-Уул</option>
                                <option value="Дорноговь" {{ ( $athletes->club == 'Дорноговь') ? 'selected' : '' }}>Дорноговь</option>
                                <option value="Дорнод" {{ ( $athletes->club == 'Дорнод') ? 'selected' : '' }}>Дорнод</option>
                                <option value="Дундговь" {{ ( $athletes->club == 'Дундговь') ? 'selected' : '' }}>Дундговь</option>
                                <option value="Завхан" {{ ( $athletes->club == 'Завхан') ? 'selected' : '' }}>Завхан</option>
                                <option value="Орхон" {{ ( $athletes->club == 'Орхон') ? 'selected' : '' }}>Орхон</option>
                                <option value="Өвөрхангай" {{ ( $athletes->club == 'Өвөрхангай') ? 'selected' : '' }}>Өвөрхангай</option>
                                <option value="Өмнөговь" {{ ( $athletes->club == 'Өмнөговь') ? 'selected' : '' }}>Өмнөговь</option>
                                <option value="Сүхбаатар" {{ ( $athletes->club == 'Сүхбаатар') ? 'selected' : '' }}>Сүхбаатар</option>
                                <option value="Сэлэнгэ" {{ ( $athletes->club == 'Сэлэнгэ') ? 'selected' : '' }}>Сэлэнгэ</option>
                                <option value="Төв" {{ ( $athletes->club == 'Төв') ? 'selected' : '' }}>Төв</option>
                                <option value="Увс" {{ ( $athletes->club == 'Увс') ? 'selected' : '' }}>Увс</option>
                                <option value="Ховд" {{ ( $athletes->club == 'Ховд') ? 'selected' : '' }}>Ховд</option>
                                <option value="Хөвсгөл" {{ ( $athletes->club == 'Хөвсгөл') ? 'selected' : '' }}>Хөвсгөл</option>
                                <option value="Хэнтий}" {{ ( $athletes->club == 'Хэнтий') ? 'selected' : '' }}>Хэнтий</option>-->
                            </select>
                            </div>
                         </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Утасны дугаар:') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $athletes->phone }}" required autocomplete="phone" autofocus>

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