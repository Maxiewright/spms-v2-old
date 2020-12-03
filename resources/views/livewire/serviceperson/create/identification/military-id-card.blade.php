<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-text model="data.militaryId.number"
                                label="Number" placeholder="Military ID Number"
                                class="xl:col-span-4"/>
    <x-form.input.livewire-date model="data.militaryId.issue" label="Issue Date"
                                placeholder="Date Issued" class="mb-3 xl:col-span-4"/>
    <x-form.input.livewire-date model="data.militaryId.expiry" label="Expiry Date"
                                placeholder="Expiry Date" class="mb-3 xl:col-span-4"/>
</div>
