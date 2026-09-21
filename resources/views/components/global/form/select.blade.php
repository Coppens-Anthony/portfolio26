@props(['name', 'isRequired' => true, 'class' => '', 'options' => [], 'isDefaultOption' => false, 'selected' => null])

<div class="flex flex-col gap-2 {{ $class }}">
    <label for="{{$name}}">
        {{$slot}} <span class="text-error">{{$isRequired ? '*' : ''}}</span>
        @error($name)
        <small class="text-error">
            {{ $message }}
        </small>
        @enderror
    </label>
    <select name="{{ $name }}" {{ $attributes }} id="{{ $name }}" class="p-2 rounded-lg border border-black">
        @if($isDefaultOption)
            <option value="">Sélectionner</option>
        @endif
        @foreach($options as $key => $value)
            <option value="{{ $key }}" @selected((string) $key === (string) $selected) class="cursor-pointer">
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>
