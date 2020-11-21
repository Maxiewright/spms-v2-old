<div>
    @include('livewire.metadata.record-card.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('drivers_permit_type_destroy','drivers_permit_type')
    </script>
@endpush
