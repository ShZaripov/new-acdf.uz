<!-- Header -->
<header class="header">
    <div class="header invert-header" data-main-target="header">
        <a href="{{ route('home') }}" class="header_logo">
            <img alt="acdf-logo" data-logo="{{ asset('/acdf-new/images/logo-'.\App::getLocale().'.svg') }}" data-logomin="{{ asset('/acdf-new/images/logo-letter-black.svg') }}"
                 data-main-target="headerLogo" src="{{ asset('/acdf-new/images/logo-'.\App::getLocale().'.svg') }}" />
        </a>
        {{-- <div class="header_menu-btn" data-action="click->menu#openMenu">
            Меню
        </div> --}}
    </div>

    <div class="menu" data-menu-target="menu">
        <div class="menu_inner" data-menu-target="menuInner">
            <div class="menu_title" data-menu-target="title">
                <a href="{{ route('home') }}">
                    <img alt="logo-uacdf" src="{{ asset('/acdf-new/images/logo-'.\App::getLocale().'.svg') }}" />
                </a>
            </div>
            <div class="menu_nav">
                @if (isset($header_menu))
                    @foreach ($header_menu as $menu)
                        <a class="menu_nav_item" href="{{ $menu['item']->url }}" data-menu-target="itemCloseMenu">
                            {{ $menu['item']->title }}
                        </a>
                    @endforeach
                @endif

                <form class="menu_nav_search" id="search-form" data-menu-target="itemKeepMenu" accept-charset="UTF-8"
                      method="get">

                    <input type="text" name="q" id="q" class="search-bar_input" autocomplete="off" placeholder="Поиск"
                           aria-label="search" />

                    <button type="submit">
                        &rarr;</button>
                </form>
                <div class="menu_lang">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                               class="menu_lang_item"
                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['label'] }}
                            </a>
                    @endforeach
                </div>
            </div>
            <div class="menu_social">
                <?php $social_network = App\Repositories\SocialNetworksRepository::getAllForSite(); ?>
                @if ($social_network)
                        @foreach ($social_network as $sn)
                            <a href="{{ $sn->url }}" title="{{ $sn->title }}" target="_blank" class="{{ $sn->icon }}" data-menu-target="itemCloseMenu" aria-label="{{ $sn->title }}"></a>
                        @endforeach
                @endif
            </div>
            <div class="icon-close bg-white" data-action="click->menu#closeMenu" aria-label="close"></div>
        </div>
    </div>
</header>
<!-- /Header -->
