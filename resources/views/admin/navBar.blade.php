<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('activities.index') }}"><i class="fa fa-table fa-fw"></i> Проекты</a>
            </li>
            <li>
                <a href="{{ route('programs.index') }}"><i class="fa fa-table fa-fw"></i> Программы</a>
            </li>
            @role('admin')
            <li>
                <a href="{{ route('pages.index') }}"><i class="fa fa-table fa-fw"></i> Страницы</a>
            </li>
            @endrole
            <?php /*
            <li>
                <a href="{{ route('publications.index') }}"><i class="fa fa-table fa-fw"></i> О нас пишут</a>
            </li>
            */ ?>
{{-- 
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Новости<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('news.index') }}"><i class="fa fa-table fa-fw"></i> Новости </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"><i class="fa fa-table fa-fw"></i> Категории </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}"><i class="fa fa-table fa-fw"></i> Теги </a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li>
                <a href="{{ route('albums.index') }}"><i class="fa fa-table fa-fw"></i> Фотогалерея</a>
            </li> --}}
{{--            <li>--}}
{{--                <a href="{{ route('videos.index') }}"><i class="fa fa-table fa-fw"></i> Видеогалерея</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('mainbanners.index') }}"><i class="fa fa-table fa-fw"></i> Баннеры</a>--}}
{{--            </li>--}}
            <li>
                <a href="{{ route('social-networks.index') }}"><i class="fa fa-table fa-fw"></i> Социальные сети</a>
            </li>
            @role('admin')
            <li>
                <a href="{{ route('menu.index') }}"><i class="fa fa-table fa-fw"></i> Меню</a>
            </li>
            <li>
                <a href="{{ route('options.index') }}"><i class="fa fa-table fa-fw"></i> Контакты</a>
            </li>
            @endrole
            <li>
                <a href="{{ route('textblocks.index') }}"><i class="fa fa-table fa-fw"></i> Текстовые блоки</a>
            </li>
            <li>
                <a href="{{ route('blocks.index') }}"><i class="fa fa-table fa-fw"></i> Блоки</a>
            </li>

            <li>
                <a href="{{ route('showMessage.index') }}"><i class="fa fa-table fa-fw"></i> Show Message</a>
            </li>

            <?php 
            /*
            <li>
                <a href="{{ route('dispatch') }}"><i class="fa fa-table fa-fw"></i> Рассылка</a>
            </li>
            */ ?>
            @role('admin')
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Admin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i> Пользователи</a>
                    </li>

                    <li>
                        <a href="{{ route('roles.index') }}"><i class="fa fa-users fa-fw"></i> Роли</a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </div>
</div>            