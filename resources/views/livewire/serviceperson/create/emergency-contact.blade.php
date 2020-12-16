<div>
    <x-form.multi-step title="Emergency Contact" step="9" >
        <livewire:serviceperson.create.emergency-contact.basic-info :data="$data"  />
        <livewire:serviceperson.create.emergency-contact.address :data="$data"   />
        <livewire:serviceperson.create.emergency-contact.phone-number :data="$data"   />
        <livewire:serviceperson.create.emergency-contact.email-address :data="$data"   />
    </x-form.multi-step>
</div>
