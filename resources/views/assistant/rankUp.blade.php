@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Цолны болзол хангасан тамирчид</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th style="text-align:center">Оноо</th>
                    </thead>
                    <tbody>
                @if(count($promotion) > 0)
                    @foreach($promotion as $row)
                      <tr>
                        <td>{{$row->last_name}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->skill}}</td>
                        <td style="text-align:center">{{$row->score}}</td>
                      </tr>
                    @endforeach
                    @else
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                        <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                        <span data-notify="message"><b>Цолны болзол хангасан тамирчин байхгүй байна !</b></span>
                    </div>
                @endif
                    @if($competition_rank->rank != 9)
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                        <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                        <span data-notify="message"><b>"{{$competition_rank->competition_name}}"</b>Уг тэмцээн цол олгохгүй !</span>
                    </div>
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection('scripts')