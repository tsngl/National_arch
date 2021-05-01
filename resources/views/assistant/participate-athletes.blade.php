@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Тэмцээнд оролцох тамирчид</h4>
              </div>
              <style>
                .w-10p{
                  width: 10% !important;
                }
              </style>
              <div class="card-body">
              <button type="button" id="selectedAll" class="btn btn-warning btn-sm float-right"><i class="fa fa-refresh"></i> ШИНЭЧЛЭХ</button>
              <button type="button" class="btn btn-warning btn-sm float-right"><i class="fa fa-cloud-upload"></i> АРХИВЛАХ</button>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th class="w-10p">
                          <div class="form-check ">
                              <label class="form-check-label">
                                <input class="form-check-input" id="chkCheckAll" type="checkbox">
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                      </th>
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Хүйс</th>
                      <th>Цол зэрэг</th>
                      <th>Харъяа клуб</th>
                    </thead>
                    <tbody>
                    @foreach($participant as $athlete)
                      <tr id="sid{{$athlete->id}}">
                        <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input checkBoxClass" type="checkbox" name="ids" value="{{$athlete->id}}"/>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                        <td>{{$athlete->last_name}}</td>
                        <td>{{$athlete->first_name}}</td>
                        <td>{{$athlete->gender}}</td>
                        <td>{{$athlete->skill}}</td>
                        <td>{{$athlete->club}}</td>
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

<script>
  $(function(e){

      $("#chkCheckAll").click(function(){
          $(".checkBoxClass").prop('checked', $(this).prop("checked")); 
      });

      $("#selectedAll").click(function(e){
        e.preventDefault();
        var allids = [];

        $("input:checkbox[name=ids]:checked").each(function(){
            allids.push($(this).val());
        });
          //alert(allids);

        $.ajax({
            url:'{{route('deleteSelected')}}',
            type: 'DELETE',
            data:{
                _token:$("input[name=_token]").val(),
                ids:allids
            },
            success: function(response){
              $.each(allids, function(key,val){
                $("#sid"+val).remove();
              })
            }
        });
      })
  });
</script>
@endsection