
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')



    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Sayfa Ekleme Sayfası</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'action'=>'Admin\PagesController@store']) !!}
            <div class="box-body">



                <div class="form-group">
                    <label for="title">Sayfa Başlık</label>
                    <input type="text" name="title" class="form-control" placeholder="Başlık">
                </div>

                <div class="form-group">
                    <label for="title">Sayfa İçerik</label>
                    <input type="text" name="pageContent" class="form-control" placeholder="İçerik">
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

