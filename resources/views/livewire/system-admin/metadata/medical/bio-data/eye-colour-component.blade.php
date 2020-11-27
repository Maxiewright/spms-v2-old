<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_single_field')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('eye_colour_destroy','eye_colour')
    </script>
@endpush
