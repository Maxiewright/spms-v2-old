<div>
    @include('livewire.metadata.record-card.partials.metadata_field_with_type')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('medical_condition_destroy','medical_condition')
    </script>
@endpush
