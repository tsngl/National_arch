@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<!-- Modal 
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center">Анхаар!</h5>
      </div>
      <form id="delete_model" method="POST" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}  
      <div class="modal-body">
          <input type="hidden" id="delete-user-id">
          <h5  style="text-align:center">Устгах гэж байна. Итгэлтэй байна уу?</h5>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Үгүй</button>
        <button type="submit" class="btn btn-primary mr-4">Тийм</button>
      </div>
      </form>
    </div>
  </div>
</div>
End Modal -->
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
                  <table id="datatable" class="table">
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
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="/post-edit/{{$item->id}}" class="btn btn-info btn-sm btn-outline-info btn-icon"><i class="now-ui-icons ui-2_settings-90" style="font-size:15px"></i></a>
                        </td>
                        <td>
                        <button type="button" class="btn btn-danger delete_btn btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove" style="font-size:15px"></i></button>
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