<!-- Sidebar -->
<div class="sidebar-area bg-white dark:bg-[#0c1427] fixed overflow-hidden z-[7] top-0 h-screen transition-all rounded-r-md"
    id="sidebar-area">
    <div
        class="logo bg-white dark:bg-[#0c1427] border-b border-gray-100 dark:border-[#172036] px-[25px] pt-[19px] pb-[15px] absolute z-[2] right-0 top-0 left-0">
        <a href="/" class="relative flex items-center transition-none">
            <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="logo-icon">
            <span class="font-bold text-black dark:text-white relative ltr:ml-[8px] rtl:mr-[8px] top-px text-xl">
                {{ config('app.name') }}
            </span>
        </a>
        <button type="button"
            class="burger-menu inline-block absolute z-[3] top-[24px] ltr:right-[25px] rtl:left-[25px] transition-all hover:text-primary-500"
            id="hide-sidebar-toggle2">
            <i class="material-symbols-outlined">
                close
            </i>
        </button>
    </div>
    <div class="pt-[89px] px-[25px] pb-[20px] h-screen" data-simplebar>
        <div class="accordion">
            @foreach (config('menu') as $menu)
                @if (!isset($menu['submenu']))
                    <div class="accordion-item rounded-md text-black dark:text-white mb-[5px] whitespace-nowrap">
                        <a href="{{ isset($menu['route']) ? route($menu['route']) : '#' }}"
                            class="accordion-button flex items-center transition-all py-[9px] ltr:pl-[14px] ltr:pr-[30px] rtl:pr-[14px] rtl:pl-[30px] rounded-md font-medium w-full lative hover:bg-gray-50 text-left dark:hover:bg-[#15203c] @if (request()->segment(1) == $menu['active']) active @endif">
                            <i
                                class="material-symbols-outlined transition-all text-gray-500 dark:text-gray-400 ltr:mr-[7px] rtl:ml-[7px] !text-[22px] leading-none relative -top-px">
                                {{ $menu['icon'] }}
                            </i>
                            <span class="leading-none title">
                                {{ $menu['label'] }}
                            </span>
                        </a>
                    </div>
                @else
                    <div class="accordion-item rounded-md text-black dark:text-white mb-[5px] whitespace-nowrap">
                        <button
                            class="accordion-button toggle flex items-center transition-all py-[9px] ltr:pl-[14px] ltr:pr-[30px] rtl:pr-[14px] rtl:pl-[30px] rounded-md font-medium w-full relative hover:bg-gray-50 text-left dark:hover:bg-[#15203c] @if (request()->segment(1) == $menu['active']) active @endif"
                            type="button">
                            <i
                                class="material-symbols-outlined transition-all text-gray-500 dark:text-gray-400 ltr:mr-[7px] rtl:ml-[7px] !text-[22px] leading-none relative -top-px">
                                {{ $menu['icon'] }}
                            </i>
                            <span class="leading-none title">
                                {{ $menu['label'] }}
                            </span>
                        </button>
                        <div class="hidden accordion-collapse"
                            @if (request()->segment(1) == $menu['active']) style="display: block" @endif>
                            <div class="pt-[4px]">
                                <ul class="sidebar-sub-menu" id="dashboardItemsList">
                                    @foreach ($menu['submenu'] as $submenu)
                                        <li class="sidemenu-item mb-[4px] last:mb-0">
                                            <a href="{{ isset($submenu['route']) ? route($submenu['route']) : '#' }}"
                                                class="sidemenu-link rounded-md flex items-center relative transition-all font-medium text-gray-500 dark:text-gray-400 py-[9px] ltr:pl-[38px] ltr:pr-[30px] rtl:pr-[38px] rtl:pl-[30px] hover:text-primary-500 hover:bg-primary-50 w-full text-left dark:hover:bg-[#15203c]">
                                                {{ $submenu['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <span class="block relative font-medium uppercase text-gray-400 mb-[8px] text-xs">
                Main
            </span> --}}

        </div>
    </div>
</div>
<!-- End Sidebar -->
