<div>
    @include('livewire.manpower.career-management.partials.metadata_field_with_slug')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('course_qualification_destroy','course_qualification')
    </script>
@endpush
