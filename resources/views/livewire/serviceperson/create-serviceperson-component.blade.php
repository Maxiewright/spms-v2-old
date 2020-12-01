<div>
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
