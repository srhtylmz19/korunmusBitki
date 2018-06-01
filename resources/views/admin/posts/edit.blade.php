
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


        {!!   Form::open(array('method'=>'POST','enctype'=>'multipart/form-data','action' => array('Admin\PostController@update',$post->id))) !!}


            <div class="form-group">
                <label for="categoryId">Kategoriler</label>
                <select name="categoryId" id="select-gallery-page" class="form-control" style="width: 100%;">

                    @foreach($categories as $category)
                        <option  @if($category->id==$post->categoryId) selected='selected' @endif  value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label>Post Başlık</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label>Post İçerik</label>
                <input type="text" class="form-control" name="postContent" id="title" placeholder="Enter ..." value="{{$post->content}}">
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

