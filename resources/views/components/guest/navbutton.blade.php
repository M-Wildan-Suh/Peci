@props(['route', 'active'])
<a href="{{ route($route) }}" class="{{ request()->routeIs($active) ? 'text-second border-b-2 border-second' : 'border-b-2 border-transparent hover:text-black hover:border-black' }} text-wrap text-center duration-300">
    {{$slot}}
</a>
