
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
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Numara</th>
                    <th>Galeri Başlık</th>
                    <th>Galleri Resim</th>
                    <th>Portfolio</th>
                    <th>Görünüm</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>


                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{$gallery->id}}</td>
                        <td>{{$gallery->title}}</td>
                        <td><img style="width: 200px; height: 200px" src="{{asset('images')}}/{{$gallery->image}}" alt=""></td>
                        <td>{{$gallery->portfolio->title}}</td>
                        <td>{{$gallery->is_active ? "Açık" : "Kapalı"}}</td>
                        <td>
                            <a href="{{url('admin/gallery/delete')}}/{{$gallery->id}}" class="btn btn-danger"  style="background-color: red">Sil</a>
                            <a href="{{url('admin/gallery/edit')}}/{{$gallery->id}}" class="btn btn-bitbucket" >Düzenle</a>
                            @if($gallery->is_active==1)
                                <a  href="{{url('admin/gallery/isActiveFalse/')}}/{{$gallery->id}}" class="btn btn-default">Gizle</a>
                            @else
                                <a href="{{url('admin/gallery/isActiveTrue/')}}/{{$gallery->id}}" class="btn btn-default" >Göster</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Numara</th>
                    <th>Galeri Başlık</th>
                    <th>Galleri Resim</th>
                    <th>Portfolio</th>
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

