@extends('layouts.app')

@section('title', $category->title ?? 'Каталог')

@section('content')
    <!-- Breadcrumbs -->
    <ul class="breadcrumbs flex flex-wrap gap-y-1 gap-x-4 mb-6">
        <li><a href="{{ route('home') }}" class="text-body hover:text-pink text-xs">Главная</a></li>
        <li><a href="{{ route('catalog') }}" class="text-body hover:text-pink text-xs">Каталог</a></li>

        @if($category->exists)
            <li>
                <span class="text-body text-xs">
                    {{ $category->title }}
                </span>
            </li>
        @endif
    </ul>

    <section>
        <!-- Section heading -->
        <h2 class="text-lg lg:text-[42px] font-black">Категории</h2>

        <!-- Categories -->
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
            @each('catalog.shared.category', $categories, 'item')
        </div>
    </section>

    <section class="mt-16 lg:mt-24">
        <!-- Section heading -->
        <h2 class="text-lg lg:text-[42px] font-black">Каталог товаров</h2>

        <div class="flex flex-col lg:flex-row gap-12 lg:gap-6 2xl:gap-8 mt-8">
            <!-- Filters -->
            <aside class="basis-2/5 xl:basis-1/4">
                <form action="{{ route('catalog', $category) }}"
                      class="overflow-auto max-h-[320px] lg:max-h-[100%] space-y-10 p-6 2xl:p-8 rounded-2xl bg-card">
                    <input type="hidden" name="sort" value="{{ request('sort') }}">

                    @foreach(filters() as $filter)
                        {!! $filter !!}
                    @endforeach

                    <div>
                        <button type="submit" class="w-full !h-16 btn btn-pink">Поиск</button>
                    </div>

                    @if(request('filters'))
                        <div>
                            <a href="{{ route('catalog', $category) }}" class="w-full !h-16 btn btn-outline">Сбросить
                                фильтры</a>
                        </div>
                    @endif
                </form>
            </aside>

            <div class="basis-auto xl:basis-3/4">
                <!-- Sort by -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ filter_url($category, ['view' => 'grid']) }}"
                               class="@if(is_catalog_view('grid')) text-pink pointer-events-none @else text-white hover:text-pink @endif inline-flex items-center justify-center w-10 h-10 rounded-md bg-card"
                            >
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 52 52">
                                    <path fill-rule="evenodd"
                                          d="M2.6 28.6h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H2.6A2.6 2.6 0 0 1 0 49.4V31.2a2.6 2.6 0 0 1 2.6-2.6Zm15.6 18.2v-13h-13v13h13ZM31.2 0h18.2A2.6 2.6 0 0 1 52 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H31.2a2.6 2.6 0 0 1-2.6-2.6V2.6A2.6 2.6 0 0 1 31.2 0Zm15.6 18.2v-13h-13v13h13ZM31.2 28.6h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H31.2a2.6 2.6 0 0 1-2.6-2.6V31.2a2.6 2.6 0 0 1 2.6-2.6Zm15.6 18.2v-13h-13v13h13ZM2.6 0h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H2.6A2.6 2.6 0 0 1 0 20.8V2.6A2.6 2.6 0 0 1 2.6 0Zm15.6 18.2v-13h-13v13h13Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="{{ filter_url($category, ['view' => 'list']) }}"
                               class="@if(is_catalog_view('list')) text-pink pointer-events-none @else text-white hover:text-pink @endif inline-flex items-center justify-center w-10 h-10 rounded-md bg-card"
                            >
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 52 52">
                                    <path fill-rule="evenodd"
                                          d="M7.224 4.875v4.694h37.555V4.875H7.224ZM4.877.181a2.347 2.347 0 0 0-2.348 2.347v9.389a2.347 2.347 0 0 0 2.348 2.347h42.25a2.347 2.347 0 0 0 2.347-2.347v-9.39A2.347 2.347 0 0 0 47.127.182H4.877Zm2.347 23.472v4.694h37.555v-4.694H7.224Zm-2.347-4.695a2.347 2.347 0 0 0-2.348 2.348v9.389a2.347 2.347 0 0 0 2.348 2.347h42.25a2.347 2.347 0 0 0 2.347-2.348v-9.388a2.347 2.347 0 0 0-2.347-2.348H4.877ZM7.224 42.43v4.695h37.555v-4.694H7.224Zm-2.347-4.694a2.347 2.347 0 0 0-2.348 2.347v9.39a2.347 2.347 0 0 0 2.348 2.346h42.25a2.347 2.347 0 0 0 2.347-2.347v-9.389a2.347 2.347 0 0 0-2.347-2.347H4.877Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>

                        <div class="text-body text-xxs sm:text-xs">
                            Найдено: {{ $products->total() }} товаров
                        </div>
                    </div>
                    <div x-data="{sort: '{{ filter_url($category, ['sort' => request('sort')]) }}'}"
                         class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <span class="text-body text-xxs sm:text-xs">Сортировать по</span>

                        <select
                            name="sort"
                            x-model="sort"
                            x-on:change="window.location = sort"
                            class="form-select w-full h-12 px-4 rounded-lg border border-body/10 focus:border-pink focus:shadow-[0_0_0_3px_#EC4176] bg-white/5 text-white text-xxs sm:text-xs shadow-transparent outline-0 transition">

                            <option value="{{ filter_url($category, ['sort' => '']) }}" class="text-dark">по умолчанию
                            </option>

                            <option value="{{ filter_url($category, ['sort' => 'price']) }}"
                                    class="text-dark">
                                от дешевых к дорогим
                            </option>

                            <option value="{{ filter_url($category, ['sort' => '-price']) }}"
                                    class="text-dark">
                                от дорогих к дешевым
                            </option>

                            <option value="{{ filter_url($category, ['sort' => 'title']) }}"
                                    class="text-dark">
                                наименованию
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Products list -->
                <div
                    class="products grid @if(is_catalog_view('list')) grid-cols-1 gap-y-8 @else grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-6 2xl:gap-x-8 gap-y-8 lg:gap-y-10 2xl:gap-y-12 @endif">
                    @each('product.shared.product' . (is_catalog_view('list') ? '-list' : ''), $products, 'item')
                </div>

                <!-- Page pagination -->
                <div class="mt-12">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </section>
@endsection
