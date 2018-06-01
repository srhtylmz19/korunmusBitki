
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

            {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'action'=>'Admin\ImageController@store']) !!}
            <div class="box-body">

                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="portfolioId">Portfolio</label>
                    <select  name="portfolioId"  id="optionPortfolio" onchange="portfolioSelected(this.value)"  class="form-control" style="width: 100%;">
                        <option disabled="disabled"  selected="selected">Seçiniz...</option>
                        @foreach($portfolios as $portfolio)
                            <option  value="{{$portfolio->id}}">{{$portfolio->title}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group" id="afterSelect" >
                    <select id="galleriesOfPortfolio" name="galleriesOfPortfolio" class="form-control">
                        <label for="portfolioId">Portfolio</label>


                    </select>
                </div>


                <div class="form-group" id="imageHeader">
                    <label for="title">Resim Başlık</label>
                    <input type="text" name="title" class="form-control" required="required" placeholder="Başlık">
                </div>

                <div class="form-group" id="galleryImage">
                    <label for="image">Galeri Görseli </label>
                    <input type="file" name="image" class="form-control" required="true">
                </div>


                <div class="form-group" id="is_activeness">
                    <label for="is_active">Gösterim Durumu</label>
                    <select name="is_active" class="form-control" style="width: 100%;">
                        <option value="1" selected="selected">Sitede Göster</option>
                        <option value="0">Sitede Gösterme</option>
                    </select>
                </div>


            </div>
            <div class="box-footer" id="save" >

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
  window.onload= function() {
        $('#galleriesOfPortfolio').hide();
        $('#galleryImage').hide();
        $('#is_activeness').hide();
        $('#save').hide();
        $('#imageHeader').hide();
};
  function invokeAfterSuccess() {

  }

  function successFunction() {

      $('#galleriesOfPortfolio').show();
      document.getElementById('galleriesOfPortfolio').addEventListener('change', function(){
          $('#galleryImage').show();
          $('#is_activeness').show();
          $('#save').show();
          $('#imageHeader').show();
      });
  }



  function portfolioSelected(selectedPortfolio)
    {

        $.ajax({
            type: 'post',
            data: {'selectedPortfolio': selectedPortfolio, _token:'{{csrf_token()}}'},
            dataType: "json",
            url: '/admin/createImage/getGalleries',
            success: function (data) {

                var gallery = document.getElementById("galleriesOfPortfolio");
                var oldLength= gallery.options.length;
                if(data != [])
                {

                    $('#galleriesOfPortfolio').empty();

                    var  option = document.createElement("option");
                    option.text ="Lütfen Seçiniz";
                    option.value ="";
                    option.selected="selected";
                    option.disabled;
                    gallery.add(option);

                    for(var i=0; i<data.length ; i++)
                    {
                        var  option2 = document.createElement("option");
                        option2.text = data[i].title;
                        option2.value = data[i].id;
                        gallery.add(option2);
                    }
                }
                else
                {
                    alert("Bu Portfolioda Galeri Bulunmamamktadır");
                }


                successFunction()


            },
            error:function (data) {
                alert("fail");
            }

        });

    }

</script>