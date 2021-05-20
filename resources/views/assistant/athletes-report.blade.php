<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
</head>
<style>
            body {
                font-family:   DejaVu Sans;
            }
</style>
<body>
<div class="container light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">
    <img  src="127.0.0.1:8000/assets/img/log.png">
    <!--<h4 class="font-weight-bold py-3 mb-4"style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ ЦОЛ ОЛГОХ ТУХАЙ</h4>-->
    <p style="text-align:center"><b>ТЭМЦЭЭНД ОРОЛЦСОН ТУХАЙ</b></p>
      <div class="row no-gutters row-bordered row-border-light">
      
            <div class="container">
                <div class="row">
                <div class="col-sm-2 imgUp">
                <div class="card-body">
                <div class="form-group">
                  <label class="form-label"><b>Овог: </b></label>{{$info->last_name}}
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Нэр: </b></label> {{$info->first_name}}
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Хүйс: </b></label> {{$info->gender}}
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Цол: </b></label> {{$info->skill}}
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Харъяа: </b></label> {{$info->club}}
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Үндсэн захиргаа: </b></label>{{$info->undsen_zahirgaa}}
                </div>
              </div><br>
              <div class="table-responsive">
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="50%">Оролцсон тэмцээний нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="20%">Оноо</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Огноо</th>
                    </tr>
                    <tbody>
                    @foreach($comp_info as $comp)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$comp->competition_name}}</td>
                        <td style="border: 1px solid; padding:5px; text-align:center">{{$comp->score}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$comp->updated_at}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br><br><br>
                <p style="text-align:center">Ерөнхий нарийн бичгийн дарга:................../Б.Хүрэлбаатар/</p>
                </div><!-- row -->
            </div><!-- container -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>