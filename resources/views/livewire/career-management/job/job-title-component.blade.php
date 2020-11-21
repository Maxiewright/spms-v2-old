@include('livewire.career-management.partials.metadata_field_with_slug')
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('job_title_destroy','job_title')
    </script>
@endpush
