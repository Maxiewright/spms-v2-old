<div>
    @include('livewire.metadata.record-card.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('drivers_permit_class_destroy','drivers_permit_class')
    </script>
@endpush
