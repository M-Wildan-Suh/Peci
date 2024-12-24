@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-neutral-400 focus:border-second focus:ring-second rounded-md shadow-sm']) !!}>
