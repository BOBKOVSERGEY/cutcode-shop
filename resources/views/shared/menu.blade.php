<nav class="2xl:flex gap-8">
    @foreach($menu as $item)
        <a href="{{  $item->link() }}"
           class="text-white hover:text-pink
           @if($item->isActive())
           font-bold
           @endif
           ">
            {{$item->label()}}
        </a>
    @endforeach
</nav>
