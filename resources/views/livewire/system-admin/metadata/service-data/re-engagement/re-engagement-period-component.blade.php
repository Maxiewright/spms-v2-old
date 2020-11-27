<div>
    @include('livewire.system-admin.metadata.partials.metadata_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('re_engagement_period_destroy','re_engagement_period')
    </script>
@endpush
