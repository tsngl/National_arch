@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <div class="row">
                <div class="col-4 center">
                            <select class="form-control"  type="text" name="comp_name" value="old('user_type')" required autofocus autocomplete="user_type">
                                <option>Тэмцээнээ сонгоно уу</option>
                            @foreach($comp as $item)
                                <option data-id="{{$item->id}}" >{{$item->competition_name}}</option>
                            @endforeach
                            </select>   
                </div>
              </div>
                <h4 class="card-title">Тамирчид</h4>
              </div>
              <style>
                .w-10p{
                  width: 10% !important;
                }
              </style>
              <div id="notifDiv"></div>
              <div class="card-body">

               
                <div class="col-md-12 mb-4">
                  <form class="form-inline md-form form-sm mt-0" type="get" action="/search">
                    <input class="form-control form-control-sm ml-3 w-75" name="query" type="search" placeholder="Хайх тамирчны нэрийг оруулна уу" aria-label="Search">
                    <button class="btn btn-warning btn-rounded rounded-pill btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>

              <form> 
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>
                          <!--<div class="form-check ">
                              <label class="form-check-label">
                                <input class="form-check-input" id="chkCheckAll" type="checkbox">
                                <span class="form-check-sign"></span>
                              </label>
                            </div>-->
                      </th>
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Хүйс</th>
                      <th>Цол зэрэг</th>
                      <th>Харъяа клуб</th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $person)
                      <tr>
                        <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input athlete-id" type="checkbox" name="id[]" value="{{$person->id}}"/>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                        <td>{{$person->last_name}}<input type="hidden" name="last_name[]" class="last_name" value="{{$person->last_name}}"></td>
                        <td>{{$person->first_name}}<input type="hidden" name="first_name[]" class="first_name" value="{{$person->first_name}}"></td>
                        <td>{{$person->gender}}<input type="hidden" name="gender[]" class="gender" value="{{$person->gender}}"></td>
                        <td>{{$person->skill}}<input type="hidden" name="skill[]" class="skill" value="{{$person->skill}}"></td>
                        <td>{{$person->club}}<input type="hidden" name="club[]" class="club" value="{{$person->club}}"></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    <input type="submit" class="btn btn-warning btn-sm save_btn" value="БҮРТГЭХ"/>
                    <button class="btn btn-warning btn-sm save_btn_pivot">Б</button>
                </div>
                    <div class="clearfix pagination float-right">
                        {{$athletes->links("pagination::bootstrap-4")}}
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
                    
@endsection

@section('scripts')
<script>
  $(document).ready(function(){

      $('.save_btn').on('click', function(e){
          e.preventDefault();

          const id = [];
          const last_name = [];
          const first_name = [];
          const gender = [];
          const skill = [];
          const club = [];

          $('.athlete-id').each(function(){
              if($(this).is(":checked")){
                id.push($(this).val());
              }
          });

          $('input[name^="last_name"]').each(function(){
              last_name.push($(this).val());
          });

          $('input[name^="first_name"]').each(function(){
              first_name.push($(this).val());
          });

          $('input[name^="gender"]').each(function(){
              gender.push($(this).val());
          });

          $('input[name^="skill"]').each(function(){
              skill.push($(this).val());
          });

          $('input[name^="club"]').each(function(){
              club.push($(this).val());
          });

          $.ajax({
              url: '{{route('participate.athletes')}}',
              type: 'POST',
              data: {
                  "_token" : "{{csrf_token()}}",
                  id : id,
                  last_name : last_name,
                  first_name : first_name,
                  gender : gender,
                  skill : skill,
                  club : club
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
</script>
<script>
$(document).ready(function(){  

      $('.save_btn_pivot').on('click', function(e){
          e.preventDefault(); 

            const id = [];
            const value = [];

            $('.athlete-id').each(function(){
              if($(this).is(":checked")){
                id.push($(this).val());
              }
            });
            
            $('select').each(function(){
              value.push($(this).children('option:selected').data('id'));
            }); 
            console.log(value);

            $.ajax({
              url: '{{route('pivot.table')}}',
              type: 'POST',
              data: {
                  "_token" : "{{csrf_token()}}",
                  id : id,
                  value : value,
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
 
</script>
@endsection