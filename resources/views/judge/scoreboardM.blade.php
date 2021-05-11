@extends('layouts.base')

@section('title')
Үндэсний сур харваа
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ САМБАР</h4>
      </div>
      <style>
        .table {
          display: flex;
        }

        .head {
          width: 100px;
          padding: 10px;
          border: 1px solid gray;
        }

        .body {
          width: 228px;
          padding: 10px;
          border: 1px solid gray;
        }
      </style>
      <div class="card-body">
        <div class="table-responsive">
          <?php
          $count = 0;
?>
          @foreach($maleAthletes as $male)
          <?php 
          
          if ($count == 0) {
            echo '<br><div class="table">
            <div class="side">
              <div class="head"></div>
              <div class="head"><b>Овог</b></div>
              <div class="head"><b>Нэр</b></div>
              <div class="head"><b>Цол</b></div>
              <div class="head"><b>Харъяа</b></div>
              <div class="head" style="height:120px"><b>ХАНА</b></div>
              <div class="head" style="height:120px"><b>ХАСАА</b></div>
              <div class="head"><b>Бүгд</b></div>
            </div>';
          }
          $count++; 
          ?>
            <div class="side">
              <div class="body" style="height: 20px"><input type="hidden" name="id" value="{{$male->id}}"/></div>
              <div class="body">{{$male->last_name}}</div>
              <div class="body">{{$male->first_name}}</div>
              <div class="body">{{$male->skill}}</div>
              <div class="body">{{$male->club}}</div>
              <div class="body" style="height: 120px">
                  <input type="text" name="score" class="score" style="height:70px"><br>
                  <button class="btn btn-info btn-sm btn-outline-success btn-icon float-right enter_score"><i class="	fa fa-check"></i></button>
              </div>
              <div class="body" style="height: 120px">
                  <input type="text" name="score" class="score" style="height:70px"><br>
                  <button class="btn btn-info btn-sm btn-outline-success btn-icon float-right enter_score"><i class="	fa fa-check"></i></button>
              </div>
              <div class="body" style="height: 43px"></div>
            </div>
          <?php
          if ($count == 4) {
            echo "</div>";
            $count = 0;
          } ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
 $(document).ready(function(){

$('.enter_score').on('click', function(e){
    e.preventDefault();

    const id = [];

    $('input[name^="score"]').each(function(){
       var score = $(this).val();
    });

    $('input[name^="id"]').on('click' function(){
        id.push($(this).val());
    });

          alert(id);

    // $.ajax({
    //     url: '{{route('participate.athletes')}}',
    //     type: 'POST',
    //     data: {
    //         "_token" : "{{csrf_token()}}",
    //         id : id,
    //         last_name : last_name,
    //         first_name : first_name,
    //         gender : gender,
    //         skill : skill,
    //         club : club,
    //         value : value
    //     },
    //     success: function(response){
    //         if(response.status){
    //               swal({
    //                   title: 'Сонгогдсон тамирчид тэмцээнд амжилттай бүртгэгдлээ',
    //                   icon: 'success',
    //                   button: "ОК",
    //                 });
    //               $('input[type="checkbox"]').prop('checked',false);
    //         } else{
    //           console.log('error');
    //         }
    //     },
    //     error: function(response){
    //       console.log('error');
    //     }
    // });

});

});
</script>
@endsection