@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('logo')
<img src="/assets/img/log.png"/>
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a href="/competition" class="btn btn-info btn-sm btn-outline-info btn-icon float-right"><i class="	fa fa-mail-reply"></i></a>
              <div class="row">
                <h4 class="card-title center" style="text-align:center">{{$comp->competition_name}}</h4>
              </div><hr>
              <style>
                .w-10p{
                  width: 10% !important;
                }
              </style>
              <div id="notifDiv"></div>
              <div class="card-body">
            
              <form> 
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th class="ml-5 pl-5">Овог</th>
                      <th>Нэр</th>
                      <th>Хүйс</th>
                      <th>Цол зэрэг</th>
                      <th>Харъяа клуб</th>
                      <th>Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $pivotTable)
                      <tr>
                        <td class="ml-5 pl-5">{{$pivotTable->last_name}}</td>
                        <td>{{$pivotTable->first_name}}</td>
                        <td>{{$pivotTable->gender}}</td>
                        <td>{{$pivotTable->skill}}</td>
                        <td>{{$pivotTable->club}}</td>
                        <td>{{$pivotTable->score }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection