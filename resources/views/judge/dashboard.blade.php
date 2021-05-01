@extends('layouts.base')

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
                    </thead>
                    <tbody>
                    @foreach($participant as $part)
                      <tr>
                        <td class="ml-5 pl-5">{{$part->last_name}}</td>
                        <td>{{$part->first_name}}</td>
                        <td>{{$part->gender}}</td>
                        <td>{{$part->skill}}</td>
                        <td>{{$part->club}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                    <div class="clearfix pagination float-right">
                        {{$participant->links("pagination::bootstrap-4")}}
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')

@endsection