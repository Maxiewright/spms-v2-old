<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_single_field')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('gender_destroy','gender')
    </script>
@endpush
