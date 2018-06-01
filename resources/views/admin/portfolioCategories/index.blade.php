
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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
                    <th>Kategori İsim</th>
                    <th>Görünüm</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>


                @foreach($portfolioCategories as $portfolioCategory)
                    <tr>
                        <td>{{$portfolioCategory->id}}</td>
                        <td>{{$portfolioCategory->title}}</td>
                        <td>{{$portfolioCategory->is_active ? "Açık" : "Kapalı"}}</td>
                        <td>
                            <a href="{{url('admin/portfolioCategories/delete')}}/{{$portfolioCategory->id}}" class="btn btn-danger"  style="background-color: red">Sil</a>
                            <a href="{{url('admin/portfolioCategories/edit')}}/{{$portfolioCategory->id}}"  class="btn btn-bitbucket" >Düzenle</a>
                            <a href="{{url('admin/portfolioCategories/showPortfolios')}}/{{$portfolioCategory->id}}"  class="btn btn-linkedin" >Portfoliyoları Gör</a>
                            @if($portfolioCategory->is_active==1)
                                <a  href="{{url('admin/portfolioCategories/isActiveFalse/')}}/{{$portfolioCategory->id}}" class="btn btn-default">Gizle</a>
                            @else
                                <a href="{{url('admin/portfolioCategories/isActiveTrue/')}}/{{$portfolioCategory->id}}" class="btn btn-default" >Göster</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Numara</th>
                    <th>Kategori İsim</th>
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


@endsection



