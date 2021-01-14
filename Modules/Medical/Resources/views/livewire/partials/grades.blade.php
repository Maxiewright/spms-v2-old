@foreach ($grades as $grade)
    <option value="{{$grade->id}}">{{$grade->id}}</option>
@endforeach
