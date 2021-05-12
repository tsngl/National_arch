@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
      <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Хэрэглэгч</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="/role-registered" class="float-right" style="color:blue">Дэлгэрэнгүй</a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Тамирчин</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$athletes}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="" class="float-right" style="color:blue">Дэлгэрэнгүй</a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Тэмцээн
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$competition}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa fa-trophy fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="" class="float-right" style="color:blue">Дэлгэрэнгүй</a>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Нийтлэл</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$post}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <a href="/post" class="float-right" style="color:blue">Дэлгэрэнгүй</a>
                                </div>
                            </div>
                        </div>
                    </div>

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