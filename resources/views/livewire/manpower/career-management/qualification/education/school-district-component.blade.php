<div>
    @include('livewire.metadata.record-card.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('school_district_destroy','school_district')
    </script>
@endpush
