<div>
    @include('livewire.metadata.record-card.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('eye_colour_destroy','eye_colour')
    </script>
@endpush
