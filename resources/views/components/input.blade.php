<div class="form-group">
    <label for="">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('email')}}" >
    <span class="text-danger">
        {{-- @error('email')
            {{$message}}
        @enderror --}}
    </span>
</div>
