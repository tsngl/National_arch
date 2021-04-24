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
                      <th class="w-10p">Овог</th>
                      <th class="w-10p">Нэр</th>
                      <th class="w-10p">Хүйс</th>
                      <th class="w-10p">Цол зэрэг</th>
                      <th class="w-10p">Харъяа клуб</th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $person)
                      <tr id="sid{{$person->id}}">
                        <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input checkBoxClass" type="checkbox" name="ids" value="{{$person->id}}"/>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                        <td>{{$person->last_name}}</td>
                        <td>{{$person->first_name}}</td>
                        <td>{{$person->gender}}</td>
                        <td>{{$person->skill}}</td>
                        <td>{{$person->club}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <button type="button" id="selectedAll" class="btn btn-success btn-sm">ТЭМЦЭЭНД ОРОЛЦОХ</button>
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
            url:"/participate",
            type: "DELETE",
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