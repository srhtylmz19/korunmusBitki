<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span> DASHBOARD</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Sayfalar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/pages/list')}}">Sayfaları Listele..</a></li>
                    <li><a href="{{url('admin/pages/create')}}">Sayfa Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Kategoriler</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/categories/list')}}">Kategorileri Listele..</a></li>
                    <li><a href="{{url('admin/categories/create')}}">Kategori Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Postlar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/posts/list')}}">Postları Listele..</a></li>
                    <li><a href="{{url('admin/posts/create')}}">Post Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Portfolio Kategorileri</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/portfolioCategories/list')}}">Kategorileri Listele..</a></li>
                    <li><a href="{{url('admin/portfolioCategories/create')}}">Kategori Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Portfolyolar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/portfolio/list')}}">Portfolyoları Listele..</a></li>
                    <li><a href="{{url('admin/portfolio/create')}}">Portfolya Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Galeri</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/gallery/list')}}">Galerileri Listele..</a></li>
                    <li><a href="{{url('admin/gallery/create')}}">Galeri Ekle..</a></li>
                    <li><a href="{{url('admin/gallery/createImage')}}">Galeriye Resim Ekle..</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Slider</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('admin/slider') }}"><i class='fa fa-link'></i> <span> Slider Oluştur</span></a></li>
                    <li class="active"><a href="{{ url('admin/showSlider') }}"><i class='fa fa-link'></i> <span> Sliderı Görüntüle</span></a></li>

                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
