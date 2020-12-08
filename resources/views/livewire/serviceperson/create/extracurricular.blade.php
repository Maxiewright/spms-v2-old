<div>
    <x-form.multi-step title="Extracurricular" step="7" >
        <x-cards.form-card title="Sport" class="sm:col-span-6">
            <livewire:serviceperson.create.extracurricular.sport :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Hobby" class="sm:col-span-6">
            <livewire:serviceperson.create.extracurricular.hobby :data="$data" />
        </x-cards.form-card>
    </x-form.multi-step>
</div>
