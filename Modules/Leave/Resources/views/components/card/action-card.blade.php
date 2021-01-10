<div {{$attributes}}>
    <div class="card">
        <div class="card-body ribbon">
            <div {{$attributes->merge(['class' => 'ribbon-box ' .$ribbonColor])}}>{{$ribbonData}}</div>
            <a href="{{$href}}" class="my_sort_cut text-muted">
                <i class="{{$icon}}"></i>
                <span>{{$action}}</span>
            </a>
        </div>
    </div>
</div>
