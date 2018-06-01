
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

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


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Sliderda Bulunan Fotoğraflar</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Numara</th>
                    <th>Resim İsim</th>
                    <th>Resim</th>
                    <th>Görünüm</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>






                @foreach($sliderImages as $sliderImage)
                    <tr>
                        <td>{{$sliderImage->id}}</td>
                        <td>{{$sliderImage->title}}</td>
                        <td><img src="{{asset('images')}}/{{$sliderImage->image}}" alt="Fotoğraf Görüntülenemiyor" style="width: 250px; height: 200px"></td>
                        <td><button style="position: center ; margin-left: 30%" class="btn btn-success">AKTİF</button></td>
                        <td>
                            <a style="position: center ; margin-left: 30%" href="{{url('admin/sliderImage/delete')}}/{{$sliderImage->id}}" class="btn btn-danger"  style="background-color: red">Sil</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Numara</th>
                    <th>Resim İsim</th>
                    <th>Resim</th>
                    <th>Görünüm</th>
                    <th>İşlemler</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>



@endsection
@section('java-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection


