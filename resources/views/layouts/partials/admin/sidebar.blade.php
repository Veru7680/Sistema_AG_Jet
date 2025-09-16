@php
$links = [
    [
        'name'   => 'Dashboard',
        'icon'   => 'fa-solid fa-gauge',
        'route'  => 'admin.dashboard',
        'active' => request()->routeIs('admin.dashboard'),
    ],

    [
     'header'=> 'separacion',
      ],

    [
        'name'   => 'Usuarios',
        'icon'   => 'fa-solid fa-gauge',
        'route'  => 'admin.dashboard',
        'active' => false
    ],
];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform
           -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0
           dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>
                  @isset($link['header'])
                  <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                     {{$link['header']}}
                  </div>

                  @else

                    <a href="{{ route($link['route']) }}"
                       class="flex items-center p-2 rounded-lg
                              hover:bg-gray-100 dark:hover:bg-gray-700
                              {{ $link['active'] ? 'bg-gray-00 dark:bg-gray-700' : '' }}">
                        <span class="w-5 h-5 inline-flex justify-center items-center">
                            <i class="{{ $link['icon'] }} text-gray-500"></i>
                        </span>
                        <span class="ms-3">{{ $link['name'] }}</span>
                    </a>
                     @endisset
                </li>
            @endforeach

        </ul>
    </div>
</aside>
