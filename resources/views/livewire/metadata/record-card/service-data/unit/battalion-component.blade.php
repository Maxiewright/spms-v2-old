<div>
    @include('livewire.metadata.record-card.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('battalion_destroy','battalion')
    </script>
@endpush
