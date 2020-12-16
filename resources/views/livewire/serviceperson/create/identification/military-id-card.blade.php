<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-text model="data.military_id.number"
                                label="Number" placeholder="Military ID Number"
                                class="xl:col-span-4"/>
    <x-form.input.livewire-date model="data.military_id.issued_on" label="Issue Date"
                                placeholder="Date Issued" class="mb-3 xl:col-span-4"/>
    <x-form.input.livewire-date model="data.military_id.expired_on" label="Expiry Date"
                                placeholder="Expiry Date" class="mb-3 xl:col-span-4"/>
</div>
