@props(['title', 'placeholder', 'name', 'value'])

<div class=" w-full">
    <div class=" flex flex-col gap-2 text-sm font-medium">
        <label for="summernote">{{$title}}</label>
        <textarea id="summernote" name="{{$name}}" placeholder="{{$placeholder}}">{!! nl2br($value == '' ? '' : $value) !!}</textarea>
    </div>
</div>
<style>
    /* Override gaya default Tailwind untuk h1 hingga h6 */
    h1, h2, h3, h4, h5, h6 {
    font-size: inherit !important;nt;
    color: inherit !important;
    line-height: inherit !important;
    margin: 0 !important;
    padding: 0 !important;
    }

    /* Kustomisasi tambahan untuk masing-masing elemen heading */
    p {
        font-size: 0.875rem !important;
    }

    h1 {
        font-size: 2em !important;
    }

    h2 {
        font-size: 1.5em !important;
    }

    h3 {
        font-size: 1.17em !important;
    }

    h4 {
        font-size: 1em !important;
    }

    h5 {
        font-size: 0.83em !important;
    }

    h6 {
        font-size: 0.67em !important;
    }

    .note-editor {
        max-width: 100%;
        border-color: #DB9F24 !important;
        /* background-color: #f5f5f5 !important; */
        border-radius: 0.375rem !important;
    }
    .note-toolbar {
        border-radius: 0.375rem 0.375rem 0 0 !important;
    }
    .note-modal {
        transform: translateY(-50%);
        top: 50%;
    }
</style>