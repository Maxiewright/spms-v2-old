<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('engagement_period_destroy','engagement_period')
    </script>
@endpush
