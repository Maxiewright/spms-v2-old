<div>
    <button
        wire:click="{{$action}}"
        type="button"
        class="btn btn-outline-{{$btnType}}"
        data-toggle="tooltip"
        data-placement="top"
        title="{{$title}}">
        <i class="fa fa-{{$icon}}"></i>
    </button>
</div>
