<div>
    <input type="{{$type}}"
           id="{{$name}}"
           class="
           intro-x login__input input input--lg border border-gray-300 block mt-2
           @error($name) is-invalid @enderror
               "
           placeholder="{{$placeholder}}"
           name="{{$name}}"
           value="{{old($name)}}"
           {{$attributes}}
    >
    @error($name)
    <div class="login__input-error w-5/6 text-theme-6 mt-2">{{$message}}</div>
    @enderror
</div>
