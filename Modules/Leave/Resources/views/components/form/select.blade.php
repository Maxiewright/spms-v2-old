<select wire:model="{{$model}}" class="form-control custom-select mb-2 mr-sm-2">
    <option {{$option.'Id' == '' ? 'selected' : ''}} value="">{{$action}}{{ucfirst($option)}}</option>
    {{$slot}}
</select>

