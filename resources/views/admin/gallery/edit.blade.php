
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Kategori Düzenleme Sayfası</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


        {!!   Form::open(array('method'=>'POST','enctype'=>'multipart/form-data','action' => array('Admin\GalleryController@update',$gallery->id))) !!}


            <div class="form-group">
                <label for="portfolioId">Portfolio</label>
                <select name="portfolioId" id="select-gallery-page" class="form-control" style="width: 100%;">

                    @foreach($portfolios as $portfolios)
                        <option  @if($portfolios->id==$gallery->portfolioId) selected='selected' @endif  value="{{$portfolios->id}}">{{$portfolios->title}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label>Galeri Başlık</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." value="{{$gallery->title}}">
            </div>

            <div class="form-group">
                <label>Gallery Resim</label> <br>

                <td><img src="{{asset('images')}}/{{$gallery->image}}" alt="Resim Görüntülenemiyor" style="width: 400px; height: 400px" ></td> <br>
            </div>
            <div class="form-group">
                <label for="image">Görsel Değiştir </label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div>

                <div class="form-group">
                    <label for="is_active">Gösterim Durumu</label>
                    <select name="is_active" class="form-control" style="width: 100%;">
                        <option value="1" selected="selected">Sitede Göster</option>
                        <option value="0">Sitede Gösterme</option>
                    </select>
                </div>

                <button class="btn btn-bitbucket">KAYDET</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>



@endsection
@section('java-script')

@endsection

