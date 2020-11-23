<div>
    @include('livewire.system-admin.metadata.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('gender_destroy','gender')
    </script>
@endpush
