@extends('layouts.main')

@section('title')
    Үндэсний сур харваа
@endsection

@section('logo')
<img src="/assets/img/log.png"/>
@endsection

@section('content')
<style>
body
{
  background-color:#f5f5f5;
}
.imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color:#fff;
    background-size: cover;
    background-repeat:no-repeat;
    display: inline-block;
    box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
  color: white;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>

<div class="container light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">
    <h4 class="font-weight-bold py-3 mb-4"style="text-align:center">ҮНДЭСНИЙ СУР ХАРВААНЫ ЦОЛ ОЛГОХ ТУХАЙ</h4>
      <div class="row no-gutters row-bordered row-border-light">
      
            <div class="container">
                <div class="row">
                <div class="col-sm-2 imgUp">
                    <div class="imagePreview"></div>
                <label class="btn btn-warning">
            Зураг оруулах<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
                </div><!-- col-2 -->
                <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Овог</label>
                  <input type="text" class="form-control mb-1" value="{{$info->last_name}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Нэр</label>
                  <input type="text" class="form-control" value="{{$info->first_name}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Хүйс</label>
                  <input type="text" class="form-control" value="{{$info->gender}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Цол</label>
                  <input type="text" class="form-control mb-1" value="{{$info->skill}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Тэмцээн</label>
                  <input type="text" class="form-control" value="{{$competition->competition_name}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Оноо</label>
                  <input type="text" class="form-control" value="{{$info->score}}">
                </div>
                <div class="form-group">
                  <label class="form-label">Олгох цол</label>
                  <input type="text" class="form-control" value="Спортын дэд мастер">
                </div>
              </div>
                </div><!-- row -->
                <div class="text-right mt-3">
                 <a href="/convert-pdf" class="btn btn-success">Хэвлэх</a>&nbsp;
                </div>
            </div><!-- container -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script>
@endsection('scripts')