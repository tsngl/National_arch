@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Архив бүртгэл</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Хүйс</th>
                      <th>Цол зэрэг</th>
                      <th>Үндсэн захиргаа</th>
                      <th>Харъяа клуб</th>
                      <th>Утасны дугаар</th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($archived as $athlete)
                      <tr>
                        <td>{{$athlete->last_name}}</td>
                        <td>{{$athlete->first_name}}</td>
                        <td>{{$athlete->gender}}</td>
                        <td>{{$athlete->skill}}</td>
                        <td>{{$athlete->undsen_zahirgaa}}</td>
                        <td>{{$athlete->club}}</td>
                        <td>{{$athlete->phone}}</td>
                        <td>
                            <a href="/athlete-restore/{{$athlete->id}}" class="btn btn-info btn-sm">СЭРГЭЭХ</a>
                        </td>
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
@endsection('scripts')