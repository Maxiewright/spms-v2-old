<div>
    <x-form.multi-step title="Service Data" step="4" >
        <x-cards.form-card title="Unit Data" class="">
            <livewire:serviceperson.create.service-data.unit :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Job" class="">
            <livewire:serviceperson.create.service-data.job :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Rank" class="sm:col-span-4">
            <livewire:serviceperson.create.service-data.rank :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Enlistment" class="sm:col-span-4">
            <livewire:serviceperson.create.service-data.enlistment :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Decoration" class="sm:col-span-4">
            <livewire:serviceperson.create.service-data.decoration :data="$data" />
        </x-cards.form-card>
    </x-form.multi-step>
</div>
