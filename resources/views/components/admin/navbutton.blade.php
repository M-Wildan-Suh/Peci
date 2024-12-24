@props(['route', 'active'])
<a href="{{route($route)}}" class="{{ request()->routeIs($active) ? 'border-second bg-second/80 text-white border-r-4' : 'text-neutral-500 hover:border-third hover:text-third hover:bg-background hover:border-r-4' }} w-full flex flex-row gap-2 items-center p-3 rounded-l-md  font-semibold duration-300">
    {{$slot}}
</a>