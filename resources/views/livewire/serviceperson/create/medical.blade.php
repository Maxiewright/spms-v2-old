<div>
    <x-form.multi-step title="Medical" step="5" >
        <x-cards.form-card title="Bio Data" class="sm:col-span-5">
            <livewire:serviceperson.create.medical.bio-data :data="$data" />
{{--            <livewire:serviceperson.create.medical.biodata.height :data="$data" />--}}
{{--            <livewire:serviceperson.create.medical.biodata.weight :data="$data" />--}}
        </x-cards.form-card>
        <x-cards.form-card title="Medical History" class="sm:col-span-7">
            <div class="p-3">
                <x-cards.form-card title="Vaccines"  class="mb-3">
{{--                    <livewire:serviceperson.create.medical.biodata.vaccine :data="$data" />--}}
                </x-cards.form-card>
                <x-cards.form-card title="Allergies" class="mb-3">
{{--                    <livewire:serviceperson.create.medical.history.allergy :data="$data" />--}}
                </x-cards.form-card>
                <x-cards.form-card title="Medical Conditions">
{{--                    <livewire:serviceperson.create.medical.history.medical-condition :data="$data" />--}}
                </x-cards.form-card>
            </div>
        </x-cards.form-card>
    </x-form.multi-step>
</div>
