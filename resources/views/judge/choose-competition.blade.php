@extends('layouts.base')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <div class="row">
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
                      <th class="ml-5 pl-5">№</th>
                      <th>Нэр</th>
                      <th style="text-align:center">Чансаа</th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($competition as $comp)
                      <tr>
                        <td class="ml-5 pl-5">{{$comp->id}}</td>
                        <td>{{$comp->competition_name}}</td>
                        <td style="text-align:center">{{$comp->rank}}</td>
                        <td>
                            <a href="/choose-comp/{{$comp->id}}" class="btn btn-info btn-sm btn-outline-success btn-icon float-right"><i class="	fa fa-check"></i></a>
                        </td>
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
@endsectiona