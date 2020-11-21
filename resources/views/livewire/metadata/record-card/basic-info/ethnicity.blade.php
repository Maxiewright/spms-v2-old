<div>
    @include('livewire.metadata.record-card.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('ethnicity_destroy','ethnicity')
    </script>
@endpush
