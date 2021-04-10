@extends('layouts.master')

@section('title')
    Үндэсний сур харваа
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_model" method="POST" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}  
      <div class="modal-body">
          <input type="text" id="delete-user-id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Хэрэглэгчид</h4>
                <a href="/register-create" class="btn btn-warning  float-right">ШИНЭ ХЭРЭГЛЭГЧ НЭМЭХ</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary" style="font-style:italic">
                      <th>ID</th>
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
                        <td>{{$row->id}}</td>
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
                        <a href="javascript:void(0)" class="btn btn-danger delete_btn btn-sm btn-outline-primary btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                    <!--<nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>-->
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

        $('#datatable').on('click', '.delete_btn', function(){
            $tr =$(this).closest('tr');

            var data =$tr.children("td").map(function(){
              return $(this).text();
            }).get();

            //console.log(data);

            $('#delete-user-id').val(data[0]);
            $('#delete_modal').attr('action','/user-info-delete/'+data[0]);
            $('#deleteModal').modal('show');
        });
    } );
  </script>
@endsection