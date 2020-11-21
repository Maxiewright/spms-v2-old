<div>
    @include('livewire.approval-system.partials.creations-layout')

    @push('livewire-scripts')
        <script>
            livewireApprovalConfirmation('approveEducation', 'approveEducationCreation')
            livewireRejectionConfirmation('disapproveEducation', 'disapproveEducationCreation')
        </script>
    @endpush
</div>
