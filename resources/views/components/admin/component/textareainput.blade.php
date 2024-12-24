@props(['title', 'placeholder', 'name', 'value', 'xModel' => null])

<div class=" w-full">
    <div class=" flex flex-col gap-2 text-sm sm:text-base font-medium">
        <label for="{{$name}}">{{$title}}</label>
        <textarea name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" {{ $xModel ? 'x-model='.$xModel : '' }}
        x-bind:textContent="{{ $xModel ? '' : $value }}"  class=" min-h-32 text-sm sm:text-base font-normal rounded-md border border-second focus:ring-third focus:border-third bg-background" cols="30" rows="4">{{$value}}</textarea>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('{{ $name }}');
    
            textarea.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height based on content
            });
    
            // Initialize height based on initial content
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    </script>
</div>