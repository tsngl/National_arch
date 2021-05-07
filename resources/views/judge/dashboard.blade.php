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
                      <th>Оноо</th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $pivotTable)
                      <tr>
                        <td class="ml-5 pl-5">{{$pivotTable->last_name}}</td>
                        <td>{{$pivotTable->first_name}}</td>
                        <td>{{$pivotTable->gender}}</td>
                        <td>{{$pivotTable->skill}}</td>
                        <td>{{$pivotTable->club}}</td>
                        <td>{{$pivotTable->score }}</td>
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
<!--<script>
  $(document).ready(function(){

      $('.select_btn').on('click', function(e){
          e.preventDefault();
          const value = [];

          $('select').each(function(){
              value.push($(this).children('option:selected').data('id'));
          }); 
          console.log(value);
          $.ajax({
              url: '/selected-comp',
              type: 'POST',
              data: {
                  "_token" : "{{csrf_token()}}",
                  value : value
              },
              success: function(response){
                  if(response.status){
                        swal({
                            title: 'Сонгогдсон тамирчид тэмцээнд амжилттай бүртгэгдлээ',
                            icon: 'success',
                            button: "ОК",
                          });
                        $('input[type="checkbox"]').prop('checked',false);
                  } else{
                    console.log('error');
                  }
              },
              error: function(response){
                console.log('error');
              }
          });

      });
      
  });
</script>-->
@endsection