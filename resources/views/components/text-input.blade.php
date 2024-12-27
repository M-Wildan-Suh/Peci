@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm sm:text-base font-normal rounded-md border border-second focus:ring-third focus:border-third bg-background']) !!}>
