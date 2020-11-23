<div>
    @include('livewire.system-admin.metadata.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('height_destroy','height')
    </script>
@endpush
