<div>
    @include('livewire.approval-system.partials.modification-layout')

    @push('livewire-scripts')
        <script>
            livewireApprovalConfirmation('approveEducation', 'approveEducationModification')
            livewireRejectionConfirmation('disapproveEducation', 'disapproveEducationModification')
        </script>
    @endpush
</div>
