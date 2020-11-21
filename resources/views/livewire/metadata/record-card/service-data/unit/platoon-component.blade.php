<div>
    @include('livewire.metadata.record-card.service-data.unit.partials.metadata_field_with_parent_unit')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('platoon_destroy','platoon')
    </script>
@endpush

