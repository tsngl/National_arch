@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Тамирчдын мэдээлэл</h4>
                <a href="/add-athletes" class="btn btn-warning  float-right">ТАМИРЧИН НЭМЭХ</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Хүйс</th>
                      <th>Цол зэрэг</th>
                      <th>Үндсэн захиргаа</th>
                      <th>Харъяа клуб</th>
                      <th>Утасны дугаар</th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($athletes as $person)
                      <tr>
                        <input type="hidden" class="delete_val_id" value="{{$person->id}}">
                        <td>{{$person->last_name}}</td>
                        <td>{{$person->first_name}}</td>
                        <td>{{$person->gender}}</td>
                        <td>{{$person->skill}}</td>
                        <td>{{$person->undsen_zahirgaa}}</td>
                        <td>{{$person->club}}</td>
                        <td>{{$person->phone}}</td>
                        <td>
                            <a href="/athlete-edit/{{$person->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                        </td>
                        <td>
                        <button type="button" class="btn btn-danger delete_btn btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>
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
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete_btn').click(function (e){
                e.preventDefault();
                
                var delete_id = $(this).closest("tr").find('.delete_val_id').val();
                //alert(delete_id);

                swal({
                    title: "Итгэлтэй байна уу?",
                    text: "Тамирчны мэдээллийг бүртгэлээс устгах гэж байна",
                    icon: "warning",
                    buttons: ["Үгүй", "Тийм"],
                    dangerMode: true,
                    })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token" : $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        };

                        $.ajax({
                            type: "DELETE",
                            url: "/athlete-delete/"+delete_id,
                            data: data,
                            success: function(response){
                                swal(response.status, {
                                        icon: "success",
                                        })
                                .then((result) => {
                                        location.reload();
                                        });
                            }
                        });
                    }

                    });
            });
        });
    </script>
@endsection('scripts')