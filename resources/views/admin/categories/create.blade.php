
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')



    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Kategori Ekleme Sayfası</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'action'=>'Admin\CategoryController@store']) !!}
            <div class="box-body">



                <div class="form-group">
                    <label for="title">Kateegori Başlık</label>
                    <input onkeyup="catCreated()" type="text" name="title" class="form-control" placeholder="Başlık">
                </div>

                <a id="postText" onclick="catPostCreate()">Kategoriye Post Eklemek için Tıklayınız</a>

                <div class="form-group" id="categoreyPost">
                    <label for="title">Kateegori Post</label>
                    <input type="text" name="post" class="form-control" placeholder="Başlık">
                </div>

                <div class="form-group" id="postContent">
                    <label for="title">Post İçerik</label> <br>
                    <textarea  class="form-control" name="postContent" id="" ></textarea>
                </div>

                <div class="form-group">
                    <label for="showState">Gösterim Durumu</label>
                    <select name="is_active" class="form-control" style="width: 100%;">
                        <option value="1" selected="selected">Sitede Göster</option>
                        <option value="0">Sitede Gösterme</option>
                    </select>
                </div>


            </div>
            <div class="box-footer">

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus-square">&nbsp;</i> Kaydet
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>



@endsection
@section('java-script')

@endsection
<script>
    window.onload=function() {
        $('#categoreyPost').hide();
        $('#postContent').hide();
        $('#postText').hide();
    }
    function catCreated() {
        $('#postText').show();

    }
    function catPostCreate() {
        $('#postText').hide();
        $('#categoreyPost').show();
        $('#postContent').show();
    }
</script>
