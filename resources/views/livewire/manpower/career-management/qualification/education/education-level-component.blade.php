<div>
   @include('livewire.metadata.record-card.partials.metadata_field_with_slug')
</div>
    @push('livewire-scripts')
        <script>
            livewireDeleteConfirmation('education_level_destroy', 'education_level')
        </script>
    @endpush
