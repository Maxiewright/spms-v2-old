<div>
    <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20">
        <x-buttons.multi-step-nav wire:click.prevent="" step="{{$step}}" thisStep="1" title="Basic Info"/>
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="2" title="Contact"  />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="3" title="Identification" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="4" title="Service Data" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="5" title="Medical"/>
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="6" title="Education" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="7" title="Extracurricular" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="8" title="Dependents" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="9" title="Emergency Contact" />
        <x-buttons.multi-step-nav wire:click="" step="{{$step}}" thisStep="10" title="Review and Submit" />
        <div class="wizard__line hidden lg:block w-11/12 bg-gray-200 dark:bg-dark-1 absolute mt-5"></div>
    </div>

    {{json_encode($data)}}
    @if ($step == 1)<livewire:serviceperson.create.basic-info :data="$data" /> @endif
    @if ($step == 2)<livewire:serviceperson.create.contact :data="$data" />@endif
    @if ($step == 3)<livewire:serviceperson.create.identification :data="$data"/> @endif
    @if ($step == 4)<livewire:serviceperson.create.service-data :data="$data"/>@endif
    @if ($step == 5)<livewire:serviceperson.create.medical :data="$data"/>@endif
    @if ($step == 6)<livewire:serviceperson.create.qualification :data="$data"/>@endif
    @if ($step == 7)<livewire:serviceperson.create.extracurricular :data="$data"/>@endif
    @if ($step == 8)<livewire:serviceperson.create.dependents :data="$data"/>@endif
    @if ($step == 9)<livewire:serviceperson.create.emergency-contact :data="$data"/>@endif
    @if ($step == 10)<livewire:serviceperson.create.review :data="$data"/>@endif
</div>
