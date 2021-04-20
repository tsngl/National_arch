@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Тамирчид</h4>
              </div>
              <style>
                .w-10p{
                  width: 10% !important;
                }
              </style>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th class="w-10p"></th>
                      <th class="w-10p">Овог</th>
                      <th class="w-10p">Нэр</th>
                      <th class="w-10p">Хүйс</th>
                      <th class="w-10p">Цол зэрэг</th>
                      <th class="w-10p">Харъяа клуб</th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $person)
                      <tr>
                        <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                        <td>{{$person->last_name}}</td>
                        <td>{{$person->first_name}}</td>
                        <td>{{$person->gender}}</td>
                        <td>{{$person->skill}}</td>
                        <td>{{$person->club}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection