@props(['name', 'placeholder', 'isRequired' => true, 'value' => ''])

<div class="flex flex-col gap-2 w-full">
    <label for="{{ $name }}">
        {{$slot}} <span class="text-error" aria-hidden="true">{{$isRequired ? '*' : ''}}</span>
        @error($name)
        <small class="text-error text-[.75rem] block">
            {{ $message }}
        </small>
        @enderror
    </label>
    <textarea {{ $isRequired ? 'required' : '' }} id="{{ $name }}" name="{{ $name }}" {{ $attributes }} placeholder="{{ $placeholder }}" class="p-2 resize-none rounded-lg border border-black"
              rows="6">{{@old($name) ?? $value}}</textarea>
</div>
