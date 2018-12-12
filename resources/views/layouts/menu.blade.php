<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>@auth{{ Auth::user()->name }}@endauth</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">УПРАВЛЕНИЕ СИСТЕМОЙ</li>
            <li><a href="/"><i class="fa fa-home"></i> <span>Главная</span></a></li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Продукты</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('product.create') }}"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Категории</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('category.create') }}"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Бренды</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('brand.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('brand.create') }}"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                </ul>
            </li>
            <li class="header">ЗАКАЗЫ</li>
            <li><a href="/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Заказы</span></a></li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-list-ol" aria-hidden="true"></i> <span>Статусы заказов</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('status.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('status.create') }}"><i class="fa fa-plus-circle"></i> Создать</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>