@extends('../layout/' . $layout)

@section('subhead')
    <title> SpMS - Events</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
            <x-layouts.page-header title="Events" />
            <livewire:events />
        </div>
    </div>
@endsection
