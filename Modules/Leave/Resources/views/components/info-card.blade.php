<div {{$attributes}}>
    <div class="card h-100">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="details">
                <span>{{$header}}</span>
                <h3 class="mb-0 counter">{{$data}}</h3>
                {{$slot}}
            </div>
            <div class="">
                <i {{ $attributes->merge(['class' => 'fa fa-'.$iconType. ' fa-'.$iconSize])}}></i>
            </div>
        </div>
    </div>
</div>
