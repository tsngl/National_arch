@extends('layouts.base')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ЭРЭГТЭЙ ТАМИРЧИД</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th class="text-right">Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($male as $process)
                      <tr>
                        <td>{{$process->first_name}}</td>
                        <td>{{$process->skill}}</td>
                        <td class="text-right">{{$process->score}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ЭМЭГТЭЙ ТАМИРЧИД</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th class="text-right">Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($female as $fe)
                      <tr>
                        <td>{{$fe->first_name}}</td>
                        <td>{{$fe->skill}}</td>
                        <td class="text-right">{{$fe->score}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
@endsection

@section('scripts')
@endsection