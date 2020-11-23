<div>
    @include('livewire.system-admin.metadata.partials.metadata_field_with_type')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('hobby_destroy','hobby')
    </script>
@endpush
