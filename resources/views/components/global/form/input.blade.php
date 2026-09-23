@props(['name', 'type' => 'text', 'placeholder' => '', 'isRequired' => true, 'value' => ''])

<div class="flex flex-col gap-2 w-full">
    <label for="{{ $name }}">
        {{$slot}} <span class="text-error" aria-hidden="true">{{$isRequired ? '*' : ''}}</span>
        @error($name)
        <small class="text-error text-[.75rem] block">
            {{ $message }}
        </small>
        @enderror
    </label>
    <input {{ $isRequired ? 'required' : '' }} type="{{ $type }}" {{ $attributes }} id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{@old($name) ?? $value}}"
           class="p-2 rounded-lg border border-black">
</div>
