<li {{ isset($liClass) && $liClass ? 'class='.$liClass : '' }}>
    <a {{ isset($aClass) ? 'class='.$aClass.(isset($activeFlag) && $activeFlag ? ' active' : '') : '' }}
        @if (isset($menuItem['href']))
            @if (isset($routePrefix))
                href="{{ route($routePrefix, $menuItem['href']) }}"
            @else
                href="{{ route($menuItem['href']) }}"
            @endif
        @else
            href="#" data-scroll="{{ $menuItem['scroll'] }}"
        @endif
    >{{ $menuItem['name'] }}</a>
</li>
