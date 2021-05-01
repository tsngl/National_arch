@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Хэрэглэгчид</h4>
                <a href="/register-create" class="btn btn-warning  float-right"><i class="fa fa-user-plus" style="font-size:15px"></i> НЭМЭХ</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Цол зэрэг</th>
                      <th>Үндсэн захиргаа</th>
                      <th>Харъяа клуб</th>
                      <th>Утасны дугаар</th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                        <input type="hidden" class="delete_val_id" value="{{$row->id}}">
                        <td>{{$row->last_name}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->skill}}</td>
                        <td>{{$row->undsen_zahirgaa}}</td>
                        <td>{{$row->club}}</td>
                        <td>{{$row->phone}}</td>
                        <td>
                            <a href="/user-info-edit/{{$row->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
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
    $(document).ready(function() {
        $('#datatable').DataTable();

    });
  </script>

 <!-- <script>
     $(document).ready(function() {
        $('.delete_btn').click(function (e){
              e.preventDefault();
              
              var delete_id = $(this).closest("tr").find('.delete_val_id').val();
              //alert(delete_id);

              $('#delete-user-id').val(delete_id);  
              $('#delete_model').attr('action','/user-info-delete/'+delete_id);
              $('#deleteModal').modal('show');
        });
     });
  </script>-->
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
                    text: "Хэрэглэгчийн мэдээллийг бүртгэлээс устгах гэж байна",
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
                            url: "/user-info-delete/"+delete_id,
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