<div>
    @include('livewire.metadata.record-card.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('marital_status_destroy','marital_status')
    </script>
@endpush
