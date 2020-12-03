<div>
    <x-form.multi-step title="Identification" previous-step="2" step="3">
        <x-cards.form-card title="National Identification Card">
            <livewire:serviceperson.create.identification.national-id-card />
        </x-cards.form-card>
        <x-cards.form-card title="Drivers Permit">
            <livewire:serviceperson.create.identification.drivers-permit />
        </x-cards.form-card>
        <x-cards.form-card title="Military Identification Card">
            <livewire:serviceperson.create.identification.military-id-card />
        </x-cards.form-card>
        <x-cards.form-card title="Passport">
            <livewire:serviceperson.create.identification.passport />
        </x-cards.form-card>
    </x-form.multi-step>
</div>



