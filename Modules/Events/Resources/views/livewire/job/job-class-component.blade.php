@include('livewire.career-management.partials.metadata_field_with_slug')
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('job_class_destroy','job_class')
    </script>
@endpush
