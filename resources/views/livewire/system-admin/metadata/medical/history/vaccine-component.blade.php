<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_single_field')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('vaccine_destroy','vaccine')
    </script>
@endpush

