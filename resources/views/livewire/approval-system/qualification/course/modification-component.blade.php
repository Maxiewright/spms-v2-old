<div>
    @include('livewire.approval-system.partials.modification-layout')

    @push('livewire-scripts')
        <script src="{{asset('js/main.js')}}"></script>
        <script>
            livewireApprovalConfirmation('approveCourse', 'approveCourseModification')
            livewireRejectionConfirmation('disapproveCourse', 'disapproveCourseModification')
        </script>
    @endpush
</div>
