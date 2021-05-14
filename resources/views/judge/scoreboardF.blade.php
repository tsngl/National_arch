@extends('layouts.base')

@section('title')
Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <a href="/report-scoreboardF" class="btn btn-sm btn-outline-success btn-icon pull-right"><i class="fa fa-file-pdf-o" style="font-size:22px"></i></a>
        <h4 class="card-title" style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ САМБАР</h4>
        <h4 class="card-title" style="text-align:center">{{$comp_name}}</h4>
      </div>
      <style>
        .table {
          display: flex;
        }

        .head {
          width: 100px;
          padding: 10px;
          border: 1px solid gray;
        }

        .body {
          width: 228px;
          padding: 10px;
          border: 1px solid gray;
        }
      </style>
      <div class="card-body">
        <div class="table-responsive">
          <?php
          $count = 0;
?>
          @foreach($femaleAthletes as $female)
          <?php 
          
          if ($count == 0) {
            echo '<br><div class="table">
            <div class="side">
              <div class="head"><b>Овог</b></div>
              <div class="head"><b>Нэр</b></div>
              <div class="head"><b>Цол</b></div>
              <div class="head"><b>Харъяа</b></div>
              <div class="head" style="height:120px"><b>ХАНА</b></div>
              <div class="head" style="height:120px"><b>ХАСАА</b></div>
              <div class="head"><b>Бүгд</b></div>
            </div>';
          }
          $count++; 
          ?>
            <div class="side">
              <div class="body">{{$female->last_name}}</div>
              <div class="body">{{$female->first_name}}</div>
              <div class="body">{{$female->skill}}</div>
              <div class="body">{{$female->club}}</div>
              <div class="body" style="height: 120px">
                <form action="/update-scoreF/{{$female->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf
                  <input type="text" name="score" class="score" style="height:70px"><br>
                  <button type="submit" class="btn btn-info btn-sm btn-outline-success btn-icon float-right enter_score"><i class="	fa fa-check"></i></button>
                </form>
              </div>
              <div class="body" style="height: 120px">
                <form action="/update-scoreF/{{$female->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @csrf
                  <input type="text" name="score" class="score" style="height:70px"><br>
                  <button type="submit" class="btn btn-info btn-sm btn-outline-success btn-icon float-right enter_score"><i class="	fa fa-check"></i></button>
                </form>
              </div>
              <div class="body" style="height: 43px; text-align:center"><b>{{$female->score}}</b></div>
            </div>
          <?php
          if ($count == 4) {
            echo "</div>";
            $count = 0;
          } ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection