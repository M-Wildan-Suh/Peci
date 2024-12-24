@props(['title', 'name', 'value'])
<div class="flex flex-col gap-2">
    <label class="font-medium text-sm">{{$title}}</label>
    <select class="js-example-basic-single" name="{{$name}}" multiple="multiple">
        @if(isset($value))
            @foreach($value as $tag)
                <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
            @endforeach
        @endif

    </select>
    <style>
        .select2 {
            width: 100% !important;
        }

        .selection .select2-selection {
            width: 100% !important;
            border-color: #DB9F24 !important;
            background-color: #f5f5f5 !important;
            min-height: 36px !important;
            padding: 0.25rem 0.375rem !important;
            border-radius: 0.375rem !important;
        }

        .selection .select2-selection:focus,
        .selection .select2-selection:focus-within {
            border: 2px solid;
            border-radius: 0.375rem 0.375rem 0 0 !important;
            border-color: black !important;
        }
        .selection li {
            margin-top: 0px !important;
            margin-left: 0px !important;
            margin-right: 0.25rem !important;
            font-size: 0.875rem !important;
            line-height: 1.25rem !important;
        }
        .selection textarea {
            margin-top: 0px !important;
            margin-left: 0px !important;
            margin-bottom: 2px !important;
            font-size: 0.875rem !important;
            line-height: 1.25rem !important;
        }
        .select2-dropdown {
            font-size: 0.875rem !important;
            overflow: hidden;
            border-radius: 0 0 0.375rem 0.375rem !important;
            border: 2px solid black
        }
    </style>
</div>
<script>
    window.addEventListener('load', function() {
        var $j = jQuery.noConflict();
        $j('.js-example-basic-single').select2({
            tags: true,
            tokenSeparators: [','],
            // maximumSelectionLength: 10,
        });
    });
</script>