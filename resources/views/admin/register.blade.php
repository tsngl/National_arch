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
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>ID</th>
                      <th>Нэр</th>
                      <th>И-Мэйл</th>
                      <th>Хэрэглэгчийн төрөл</th>
                      <th>Нууц үг</th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                       <td>{{$row->id}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->user_type}}</td>
                        <td>{{$row->password}}</td>
                        <td>
                            <a href="/role-edit/{{$row->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                        </td>
                        <td>
                            <!--<form action="/role-delete/{{$row->id}}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                            </form>-->
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