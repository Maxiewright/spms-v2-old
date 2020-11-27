<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_single_field')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('skin_colour_destroy','skin_colour')
    </script>
@endpush
