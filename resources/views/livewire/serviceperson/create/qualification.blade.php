<div>
    <x-form.multi-step title="Qualification" step="4" >
        <x-cards.form-card title="Formal Education" class="">
            <livewire:serviceperson.create.qualification.education :data="$data" />
        </x-cards.form-card>
        <x-cards.form-card title="Courses" class="">
            <livewire:serviceperson.create.qualification.course :data="$data" />
        </x-cards.form-card>
    </x-form.multi-step>
</div>
