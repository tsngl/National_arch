@extends('layouts.base')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ САМБАР</h4>
              </div>
              <style>
                .w-10p{
                  width: 10% !important;
                }
              </style>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                      <th colspan="6"></th>
                    </tr>
                    <tr>
                      <th rowspan="7" class="rotate" style="text-align:center">Мэргэ</th>
                      <th>ОВОГ</th>
                      @foreach($maleAthletes as $male)
                      <td>{{$male->last_name}}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>НЭР</th>
                      @foreach($maleAthletes as $male)
                      <td>{{$male->first_name}}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>ЦОЛ</th>
                      @foreach($maleAthletes as $male)
                      <td>{{$male->skill}}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>ХАРЪЯА</th>
                      @foreach($maleAthletes as $male)
                      <td>{{$male->club}}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>ХАНА</th>
                      @foreach($maleAthletes as $male)
                      <td></td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>ХАСАА</th>
                      @foreach($maleAthletes as $male)
                      <td></td>
                      @endforeach
                    </tr>
                    <tr>
                      <th>БҮГД</th>
                      @foreach($maleAthletes as $male)
                      <td></td>
                      @endforeach
                    </tr>
                    </table>
                  </div>       
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')

@endsection