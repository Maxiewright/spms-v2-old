<div>
    @include('livewire.system-admin.metadata.partials.single-field-metadata')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('medical_condition_destroy','medical_condition')
    </script>
@endpush

