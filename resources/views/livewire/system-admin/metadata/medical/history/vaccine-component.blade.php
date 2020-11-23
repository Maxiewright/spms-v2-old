<div>
    @include('livewire.system-admin.metadata.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('vaccine_destroy','vaccine')
    </script>
@endpush

