@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Хэрэглэгч</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>№</th>
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th>Утасны дугаар</th>
                      <th>Хэрэглэгчийн төрөл</th>
                      <th>ЗАСАХ</th>
                      <th>УСТГАХ</th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->skill}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->user_type}}</td>
                        <td>
                            <a href="/role-edit/{{$row->id}}" class="btn btn-success">ЗАСАХ</a>
                        </td>
                        <td>
                            <form action="/role-delete/{{$row->id}}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger">УСТГАХ</button>
                            </form>
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
@endsection