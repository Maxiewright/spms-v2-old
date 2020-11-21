<div>
    @include('livewire.approval-system.partials.creations-layout')

    @push('livewire-scripts')
        <script>
            livewireApprovalConfirmation('approveUnit', 'approveUnitCreation')
            livewireRejectionConfirmation('disapproveUnit', 'disapproveUnitCreation')
        </script>
    @endpush
</div>
