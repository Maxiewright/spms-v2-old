<div>
    @include('livewire.career-management.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('course_type_destroy','course_type')
    </script>
@endpush
