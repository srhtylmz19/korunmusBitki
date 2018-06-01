
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')



    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Post Ekleme Sayfası</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'action'=>'Admin\PortfolioController@store']) !!}
            <div class="box-body">


                <div class="form-group">
                    <label for="categoryId">Kategoriler</label>
                    <select name="categoryId" id="select-gallery-page" class="form-control" style="width: 100%;">
                        <option disabled="disabled" selected="selected">Seçiniz...</option>
                        @foreach($portfolioCategories as $portfolioCategory)
                            <option value="{{$portfolioCategory->id}}">{{$portfolioCategory->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Post Başlık</label>
                    <input type="text" name="title" class="form-control" placeholder="Başlık">
                </div>
                <div class="form-group">
                    <label for="title">Post İçerik</label>
                    <input type="text" name="portfolioContent" class="form-control" placeholder="Başlık">
                </div>

                <div class="form-group">
                    <label for="is_active">Gösterim Durumu</label>
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

