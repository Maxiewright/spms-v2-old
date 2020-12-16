<div>
    <x-form.multi-step title="Contact" step="2" >
        <livewire:serviceperson.create.contact.address :data="$data"   />
        <livewire:serviceperson.create.contact.phone-number :data="$data" />
        <livewire:serviceperson.create.contact.email-address :data="$data" />
    </x-form.multi-step>
</div>






