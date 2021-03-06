@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('logo')
<img src="/assets/img/log.png"/>
@endsection

@section('content')
<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Тэмцээн</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/save-comp">
                    @csrf
        <div class="form-group row">
                            <label for="competition_name" class="col-md-4 col-form-label text-md-right">{{ __('Тэмцээний нэр:') }}</label>

                            <div class="col-md-6">
                                <input id="competition_name" type="text" class="form-control @error('competition_name') is-invalid @enderror" name="competition_name" value="{{ old('competition_name') }}" required autocomplete="competition_name" autofocus>

                                @error('competition_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Чансаа:') }}</label>

                            <div class="col-md-6">
                                <input id="rank" type="text" class="form-control @error('rank') is-invalid @enderror" name="rank" value="{{ old('rank') }}" required autocomplete="rank" autofocus>

                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Төлөв:') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" id="status" type="text" name="status" value="old('status')" required autofocus autocomplete="status">
                                <option>1</option>
                                <option>0</option>
                            </select>
                            </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                            <button type="submit" class="btn btn-success">Хадгалах</button>
                        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal-->
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <!--<a href="/add-competition" class="btn btn-warning  float-right">НЭМЭХ</a>-->
                <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">НЭМЭХ</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th></th>
                      <th>Тэмцээний нэр</th>
                      <th class="text-center">Чансаа</th>
                      <th class="text-center">Төлөв</th>
                      <th class="text-right"></th>
                    </thead>
                    <tbody>
                    @foreach($comp as $competition)
                      <tr>
                        <td>{{$competition->id}}</td>
                        <td>{{$competition->competition_name}}</td>
                        <td class="text-center">{{$competition->rank}}</td>
                        <td class="text-center">{{$competition->status}}</td>
                        <td class="text-right">
                            <a href="/comp-edit/{{$competition->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                            <a href="/comp-details/{{$competition->id}}" class="btn btn-success btn-sm btn-outline-success btn-icon"><i class="fa fa-eye"></i></a>
                            <a href="/comp-delete/{{$competition->id}}" class="btn btn-danger delete_btn btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove" style="font-size:15px"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                    <div class="clearfix pagination float-right">
                        {{$comp->links("pagination::bootstrap-4")}}
                    </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection('scripts')