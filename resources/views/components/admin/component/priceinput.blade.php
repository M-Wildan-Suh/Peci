@props(['title', 'placeholder', 'name', 'value', 'xModel' => null])
<div class=" w-full">
    <div class=" flex flex-col gap-2 text-sm sm:text-base font-medium">
        <label for="{{ $name }}">{{ $title }}</label>
        <div
            class="flex flex-row w-full border border-transparent focus-within:border-third focus-within:ring-1 focus-within:ring-third rounded-md">
            <label for="{{ $name }}"
                class="py-2 px-3 border border-second bg-second text-white rounded-l-md">Rp. </label>
            <input type="number" id="{{ $name }}" min="0" name="{{ $name }}"
                placeholder="{{ $placeholder }}" {{ $xModel ? 'x-model=' . $xModel : '' }}
                x-bind:value="{{ $xModel ? '' : $value }}"
                value="{{ $value }}" class="flex-grow min-w-0 text-sm sm:text-base font-normal rounded-r-md border border-second focus:ring-0 focus:border-none bg-background">
        </div>
    </div>
</div>
