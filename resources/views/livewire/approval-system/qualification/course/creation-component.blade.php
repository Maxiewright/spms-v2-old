<div>
    @include('livewire.approval-system.partials.creations-layout')

    @push('livewire-scripts')
        <script>
            livewireApprovalConfirmation('approveCourse', 'approveCourseCreation')
            livewireRejectionConfirmation('disapproveCourse', 'disapproveCourseCreation')
        </script>
    @endpush
</div>
