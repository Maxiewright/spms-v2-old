@extends('../layout/' . $layout)

@section('subhead')
    <title>Medical Classification</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
            <x-layout.page-header title="Medical Classification" />
            <livewire:medical-classification />
        </div>
    </div>
@endsection
