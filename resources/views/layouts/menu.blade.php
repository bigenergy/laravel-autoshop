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
            <li class="treeview">
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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes" aria-hidden="true"></i> <span>Типы продуктов</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('type.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('type.create') }}"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i> <span>Свойства продуктов</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('props.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('props.create') }}"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                </ul>
            </li>
            <li class="treeview">
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
            <li class="treeview">
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
            <li class="header">КОНТЕНТ</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Статичные страницы</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pages.index') }}"><i class="fa fa-list-ol"></i> Список</a></li>
                    <li><a href="{{ route('pages.create') }}"><i class="fa fa-plus-circle"></i> Создать</a></li>
                </ul>
            </li>
            <li class="header">ЗАКАЗЫ</li>
            <li class="{{ Request::is('admin/order') ? 'active' : '' }}"><a href="{{ route('order.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Список заказов</span></a></li>
            <li class="{{ Request::is('admin/order/create') ? 'active' : '' }}"><a href="{{ route('order.create') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Новый заказ</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Статусы заказов</span>
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