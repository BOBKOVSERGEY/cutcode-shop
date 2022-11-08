<footer class="footer py-8 sm:py-12 xl:py-16">
    <div class="container">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
            <div class="footer-logo order-0 basis-full sm:basis-1/2 lg:basis-1/3 shrink-0 text-center sm:text-left">
                <a href="{{ route('home') }}" class="inline-block" rel="home">
                    <img src="{{Vite::image('logo-dark.svg')}}" class="w-[155px] h-[38px]" alt="CutCode">
                </a>
            </div><!-- /.footer-logo -->
            <div class="footer-copyright order-2 lg:order-1 basis-full lg:basis-1/3 mt-8 lg:mt-0">
                <div class="text-[#999] text-xxs xs:text-xs sm:text-sm text-center">CutCode, {{ now()->year }} © Все
                    права
                    защещены.
                </div>
            </div><!-- /.footer-copyright -->
            <div class="footer-social order-1 lg:order-2 basis-full sm:basis-1/2 lg:basis-1/3 mt-8 sm:mt-0">
                <div class="flex flex-wrap items-center justify-center sm:justify-end space-x-6">
                    <a href="#" class="inline-flex items-center text-white hover:text-pink" target="_blank"
                       rel="nofollow noopener">
                        <img class="h-5 lg:h-6" src="{{Vite::image('icons/youtube.svg')}}" alt="YouTube">
                        <span class="ml-2 lg:ml-3 text-xxs font-semibold">YouTube</span>
                    </a>
                    <a href="#" class="inline-flex items-center text-white hover:text-pink" target="_blank"
                       rel="nofollow noopener">
                        <img class="h-5 lg:h-6" src="{{Vite::image('icons/telegram.svg')}}" alt="Telegram">
                        <span class="ml-2 lg:ml-3 text-xxs font-semibold">Telegram</span>
                    </a>
                </div>
            </div><!-- /.footer-social -->
        </div>
    </div><!-- /.container -->
</footer>

<div id="mobileMenu" class="hidden bg-white fixed inset-0 z-[9999]">
    <div class="container">
        <div class="mmenu-heading flex items-center pt-6 xl:pt-12">
            <div class="shrink-0 grow">
                <a href="{{ route('home') }}" rel="home">
                    <img src="{{Vite::image('logo-dark.svg')}}" class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]"
                         alt="CutCode">
                </a>
            </div>
            <div class="shrink-0 flex items-center">
                <button id="closeMobileMenu" class="text-dark hover:text-purple transition">
                    <span class="sr-only">Закрыть меню</span>
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div><!-- /.mmenu-heading -->
        <div class="mmenu-inner pt-10">
            @auth
                <div class="flex items-center">
                    <img src="{{auth()->user()->avatar}}" class="w-14 h-14 rounded-full" alt="{{auth()->user()->name}}">
                    <div class="flex flex-col items-start ml-4">
                        <span class="text-dark text-xs md:text-sm font-bold">{{auth()->user()->name}}</span>
                        <form action="{{ route('logOut') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center text-dark hover:text-pink">
                                <svg class="shrink-0 w-[14px] h-[14px]" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="m19.026 7.643-3.233-3.232a.833.833 0 0 0-1.178 1.178l3.232 3.233c.097.098.18.207.25.325-.012 0-.022-.007-.035-.007l-13.07.027a.833.833 0 1 0 0 1.666l13.066-.026c.023 0 .042-.012.064-.014a1.621 1.621 0 0 1-.278.385l-3.232 3.233a.833.833 0 1 0 1.178 1.178l3.233-3.232a3.333 3.333 0 0 0 0-4.714h.003Z"/>
                                    <path
                                        d="M5.835 18.333H4.17a2.5 2.5 0 0 1-2.5-2.5V4.167a2.5 2.5 0 0 1 2.5-2.5h1.666a.833.833 0 1 0 0-1.667H4.17A4.172 4.172 0 0 0 .002 4.167v11.666A4.172 4.172 0 0 0 4.169 20h1.666a.833.833 0 1 0 0-1.667Z"/>
                                </svg>
                                <span class="ml-[6px] font-medium">Выйти</span>
                            </button>
                        </form>
                    </div>
                </div>
            @elseguest
                <a href="{{ route('login') }}" class="profile flex items-center mr-12">
                    <svg class="profile-icon w-8 h-8 text-purple" xmlns="http://www.w3.org/2000/svg"
                         aria-hidden="true" role="img" width="1em"
                         height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                        <defs/>
                        <path
                            d="M26.749 24.93A13.99 13.99 0 1 0 2 16a13.899 13.899 0 0 0 3.251 8.93l-.02.017c.07.084.15.156.222.239c.09.103.187.2.28.3c.28.304.568.596.87.87c.092.084.187.162.28.242c.32.276.649.538.99.782c.044.03.084.069.128.1v-.012a13.901 13.901 0 0 0 16 0v.012c.044-.031.083-.07.128-.1c.34-.245.67-.506.99-.782c.093-.08.188-.159.28-.242c.302-.275.59-.566.87-.87c.093-.1.189-.197.28-.3c.071-.083.152-.155.222-.24zM16 8a4.5 4.5 0 1 1-4.5 4.5A4.5 4.5 0 0 1 16 8zM8.007 24.93A4.996 4.996 0 0 1 13 20h6a4.996 4.996 0 0 1 4.993 4.93a11.94 11.94 0 0 1-15.986 0z"
                            fill="currentColor"/>
                    </svg>
                    <span class="profile-text relative ml-2 text-dark font-bold">Войти</span>
                </a>
            @endauth
            <nav class="flex flex-col mt-8">
                <a href="{{ route('home') }}" class="self-start py-1 text-dark hover:text-pink text-md font-bold">Главная</a>
                <a href="#" class="self-start py-1 text-dark hover:text-pink text-md font-bold">Каталог
                    товаров</a>
                <a href="#" class="self-start py-1 text-dark hover:text-pink text-md font-bold">Мои заказы</a>
                <a href="#" class="self-start py-1 text-dark hover:text-pink text-md font-bold">Корзина</a>
            </nav>
            <div class="flex flex-wrap items-center space-x-6 mt-8">
                <a href="#" class="inline-flex items-center text-darkblue hover:text-purple" target="_blank"
                   rel="nofollow noopener">
                    <img class="h-5 lg:h-6" src="{{Vite::image('icons/youtube.svg')}}" alt="YouTube">
                    <span class="ml-2 lg:ml-3 text-xxs font-semibold">YouTube</span>
                </a>
                <a href="#" class="inline-flex items-center text-darkblue hover:text-purple" target="_blank"
                   rel="nofollow noopener">
                    <img class="h-5 lg:h-6" src="{{Vite::image('icons/telegram.svg')}}" alt="Telegram">
                    <span class="ml-2 lg:ml-3 text-xxs font-semibold">Telegram</span>
                </a>
            </div>
        </div><!-- /.mmenu-inner -->
    </div><!-- /.container -->
</div>
