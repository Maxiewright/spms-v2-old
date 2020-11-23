<div>
    @include('livewire.system-admin.metadata.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('blood_type_destroy','blood_type')
    </script>
@endpush
