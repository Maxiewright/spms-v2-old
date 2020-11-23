<div>
    @include('livewire.system-admin.metadata.partials.metadata_field_with_type')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('sport_destroy','sport')
    </script>
@endpush
