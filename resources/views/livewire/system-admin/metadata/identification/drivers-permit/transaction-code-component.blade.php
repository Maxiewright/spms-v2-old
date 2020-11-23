<div>
    @include('livewire.system-admin.metadata.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('drivers_permit_transaction_code_destroy','drivers_permit_transaction_code')
    </script>
@endpush
