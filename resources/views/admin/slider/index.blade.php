
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
<style>
    body {
        background-color: #f1f1f1;
        padding: 20px;
        font-family: Arial;
    }
    .column {
        float: left;
        width: 20%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

@section('main-content')

    @if(session()->has('done'))



        <div class="row">
            <div class="alert alert-success">
                <button type="button" class="close"
                        data-dismiss="alert" aria-hidden="true">
                    &times;;</button>
                <strong> *Harika,Başarılı    </strong>{{session()->get('done')}}
            </div>
        </div>



    @endif

    @if(session()->has('notDone'))

        <div class="row">
            <div class="alert alert-danger">
                <button type="button" class="close"
                        data-dismiss="alert" aria-hidden="true">
                    &times;;</button>
                <strong> *Malesef Olmadı  </strong>{{session()->get('notDone')}}
            </div>
        </div>

    @endif

<div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div style="text-align: center">
        <button style="width: 500px; height: 50px; font-weight: bold; font-size: 15px"  class="btn btn-success" onclick="createSlider()">Slider Oluştur</button>
    </div>


    <div ondrop="drop(event)" ondragover="allowDrop(event)" id="rectangle" style="width:100%; height: 400px; border-style: dotted ; margin-top:50px ;" ></div>
    <br> <br> <br>

    <div>
        <button id="kaydet" type="submit" class="btn btn-danger" onclick="saveClicked()" style="margin-bottom: 10px ; margin-left: 45%">KAYDET</button>
    </div>

    @foreach($images as $image)
    <div class="column nature">
        <div class="contentImage">
            <img  id="{{$image->id}}" draggable="true" ondragstart="drag(event)" style="width: 300px; height: 300px ; margin-bottom: 10px; margin-left: 30px" src="{{asset('images')}}/{{$image->image}}"  alt="Mountains" style="width:100%">
        </div>
    </div>
        @endforeach


</div>




@endsection
@section('java-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

<script>
    window.onload= function() {
        $('#rectangle').hide();
        $('#kaydet').hide();

    };
    var arr=[];
    function drag(ev) {

        ev.dataTransfer.setData("text", ev.target.id);
    }
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
        arr.push(data);
    }
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function createSlider() {
        $('#rectangle').show();
        $('#kaydet').show();
    }
    function saveClicked() {
        $.ajax({
           type:'post',
            data: {'images': arr, _token:'{{csrf_token()}}'},
            dataType: "json",
            url: '/admin/setSlider',
            success:function (data) {
                alert('Slider Başarıyla Oluşturuldu');
                document.location = './showSlider' ;
            },
            error:function (data) {
                alert("Slider Oluşturulamadı");
            }

        });
    }
</script>