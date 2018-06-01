
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

            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'action'=>'Admin\PortfolioCategoriesController@store']) !!}
            <div class="box-body">



                <div class="form-group">
                    <label for="title">Portfolio Kateegori Başlık</label>
                    <input id="portfolioCategory" type="text" name="title" class="form-control" onkeyup="portCatEnter(this)" placeholder="Başlık">
                </div>

                <div class="form-control" id="createPortfolio">
                <a onclick="portCreateClicked()">Portfolio Eklemek için Tıkla</a>
                </div>
                <br>

                <div class="form-group" id="portfolioCreate">
                    <label for="title">Portfolio  Başlık</label>
                    <input id="portfolioCreateInput" type="text" name="portfolioTitle" class="form-control" onkeyup="portEnter(this)" placeholder="Başlık">
                </div>

                <div class="form-control" id="createGallery">
                    <a onclick="galleryCreateClicked()">Galeri Eklemek için Tıkla</a>
                </div>
                <br>

                <div class="form-group" id="galleryCreate">
                    <label for="title">Galeri  Başlık</label>
                    <input id="galleryCreateInput" type="text" name="galleryTitle" class="form-control" onkeyup="galleryEnter(this)" placeholder="Başlık">
                </div>

                <div class="form-group" >
                    <a id="galleryImageShow" onclick="galleryImage()">Galeriye Resim Eklemek için  Tıklayınız</a>
                    <input id="galleryFileImage" type="file" name="image">
                </div>
                <br>


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
        $('#createPortfolio').hide();
        $('#portfolioCreate').hide();
        $('#createGallery').hide();
        $('#galleryCreate').hide();
        $('#galleryImageShow').hide();
        $('#galleryFileImage').hide();
    }
    function portCatEnter(theWord)
    {
            $('#createPortfolio').show();
    }
    function portCreateClicked()
    {
        if(document.getElementById("portfolioCategory").value != null);
        {
            $("#createPortfolio").hide();
            $("#portfolioCreate").show();
        }
    }
    function portEnter(theWord) {
        if(document.getElementById("portfolioCreateInput").value != null)
        {
            $("#createGallery").show();
        }
        else
        {
            alert('Portfolio Kategori Başlık Boş Geçilemez');

        }
    }
    function galleryCreateClicked() {
        if(document.getElementById("portfolioCreateInput").value != null)
        {
            $('#createGallery').hide();
            $('#galleryCreate').show();
        }
        else
        {
            alert('Portfolio Başlık Boş Geçilemez');
        }
    }
    function galleryEnter() {
        if(document.getElementById("galleryCreateInput").value != null)
        {
            $('#galleryImageShow').show();
        }
        else
        {
            alert('Galeri Başlık Boş Geçilemez');
        }
    }
    function galleryImage() {
        $('#galleryImageShow').hide();
        $('#galleryFileImage').show();

    }

</script>
