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
            .float-right {
                float:right!important
                }
</style>
<body>
<div class="container light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">
    <img  src="127.0.0.1:8000/assets/img/log.png">
    <!--<h4 class="font-weight-bold py-3 mb-4"style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ ЦОЛ ОЛГОХ ТУХАЙ</h4>-->
    <p style="text-align:center"><b>ТЭМЦЭЭНД ОРОЛЦОХ ТАМИРЧДЫН БҮРТГЭЛ</b></p>
    <p style="text-align:center">/{{$comp->competition_name}}/</p>
    <p class="float-right">{{$time}}</p><br>
      <div class="row no-gutters row-bordered row-border-light">
      
            <div class="container">
                <div class="row">
            @if($aldar->count() != 0)
              <div class="table-responsive">
              <div>Алдар спорт хороо<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                  
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($aldar as $aldar_sport)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$aldar_sport->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$aldar_sport->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$aldar_sport->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$aldar_sport->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$aldar_sport->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
            @endif
            @if($khilchin->count() != 0)
                <div class="table-responsive">
              <div>Хилчин спорт хороо<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($khilchin as $khilchin)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$khilchin->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khilchin->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khilchin->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khilchin->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khilchin->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($ysuuhei->count() != 0)
                <div class="table-responsive">
              <div>Есүхэй мэргэн клуб<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($ysuuhei as $ysu)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$ysu->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ysu->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ysu->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ysu->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ysu->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($mergen->count() != 0)
                <div class="table-responsive">
              <div>Мэргэн зэв клуб<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($mergen as $mergen)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$mergen->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$mergen->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$mergen->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$mergen->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$mergen->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($arkhangai->count() != 0)
                <div class="table-responsive">
              <div>Архангай<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($arkhangai as $ar)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$ar->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ar->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ar->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ar->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ar->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($bayn_ulgii->count() != 0)
                <div class="table-responsive">
              <div>Баян-Өлгий<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($bayn_ulgii as $ulgii)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$ulgii->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ulgii->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ulgii->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ulgii->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$ulgii->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($baynkhongor->count() != 0)
                <div class="table-responsive">
              <div>Баянхонгор<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($baynkhongor as $khongor)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$khongor->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khongor->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khongor->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khongor->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$khongor->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($bulgan->count() != 0)
                <div class="table-responsive">
              <div>Булган<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($bulgan as $bulgan)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$bulgan->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$bulgan->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$bulgan->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$bulgan->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$bulgan->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($govi_altai->count() != 0)
                <div class="table-responsive">
              <div>Говь-Алтай<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($govi_altai as $altai)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$altai->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$altai->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$altai->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$altai->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$altai->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($govisumber->count() != 0)
                <div class="table-responsive">
              <div>Говьсүмбэр<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($govisumber as $sumber)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$sumber->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$sumber->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$sumber->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$sumber->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$sumber->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($darkhan->count() != 0)
                <div class="table-responsive">
              <div>Дархан-Уул<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($darkhan as $darkhan)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$darkhan->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$darkhan->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$darkhan->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$darkhan->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$darkhan->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($dornogovi->count() != 0)
                <div class="table-responsive">
              <div>Дорноговь<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($dornogovi as $dgo)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$dgo->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dgo->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dgo->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dgo->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dgo->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($dornod->count() != 0)
                <div class="table-responsive">
              <div>Дорнод<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($dornod as $dornod)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$dornod->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dornod->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dornod->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dornod->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dornod->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($dundgovi->count() != 0)
                <div class="table-responsive">
              <div>Дундговь<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($dundgovi as $dua)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$dua->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dua->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dua->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dua->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$dua->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($zawkhan->count() != 0)
                <div class="table-responsive">
              <div>Завхан<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($zawkhan as $zawkhan)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$zawkhan->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$zawkhan->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$zawkhan->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$zawkhan->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$zawkhan->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($orkhon->count() != 0)
                <div class="table-responsive">
              <div>Орхон<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($orkhon as $orkhon)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$orkhon->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$orkhon->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$orkhon->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$orkhon->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$orkhon->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($oworkhangai->count() != 0)
                <div class="table-responsive">
              <div>Өвөрхангай<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($oworkhangai as $owor)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$owor->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$owor->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$owor->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$owor->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$owor->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($omnogovi->count() != 0)
                <div class="table-responsive">
              <div>Өмнөговь<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($omnogovi as $oma)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$oma->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$oma->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$oma->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$oma->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$oma->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($sukhbaatar->count() != 0)
                <div class="table-responsive">
              <div>Сүхбаатар<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($sukhbaatar as $baatar)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$baatar->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$baatar->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$baatar->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$baatar->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$baatar->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                @if($selenge->count() != 0)
                <div class="table-responsive">
              <div>Сэлэнгэ<hr></div>
                  <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                      <th style="border: 1px solid; padding:12px;" width="20%">Овог</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Нэр</th>
                      <th style="border: 1px solid; padding:12px;" width="5%">Хүйс</th>
                      <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
                      <th style="border: 1px solid; padding:12px;" width="25%">Үндсэн захиргаа</th>
                    </tr>
                    <tbody>
                    @foreach($selenge as $selenge)
                      <tr>
                        <td style="border: 1px solid; padding:5px;">{{$selenge->last_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$selenge->first_name}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$selenge->gender}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$selenge->skill}}</td>
                        <td style="border: 1px solid; padding:5px;">{{$selenge->undsen_zahirgaa}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div><br>
                @endif
                <br><br><br>
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