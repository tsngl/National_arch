@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Нийтлэл</h4>
                <a href="/post-create" class="btn btn-warning  float-right"><i class="fa fa-plus" style="font-size:15px"></i> НЭМЭХ</a>
                <a href="/posted" class="btn btn-warning float-right"><i class="fa fa-home" style="font-size:15px"></i></a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table table-hover">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>Гарчиг</th>
                      <th>Тайлбар</th>
                      <th>Төлөв</th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($post as $item)
                      <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td class="text-center">{{$item->status}}</td>
                        <td>
                            <a href="/post-edit/{{$item->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90" style="font-size:15px"></i></a>
                        </td>
                        <td>
                        <a href="/change-status/{{$item->id}}" class="btn btn-danger btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove" style="font-size:15px"></i></a>
                        </td>
                      </tr>
                   @endforeach
                    </tbody>
                  </table>
                </div>
                    <div class="clearfix pagination float-right">
                        {{$post->links("pagination::bootstrap-4")}}
                    </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection('scripts')