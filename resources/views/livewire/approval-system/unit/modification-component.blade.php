<div>
    @include('livewire.approval-system.partials.modification-layout')

    @push('livewire-scripts')
        <script>
            livewireApprovalConfirmation('approveUnit', 'approveUnitModification')
            livewireRejectionConfirmation('disapproveUnit', 'disapproveUnitModification')
        </script>
    @endpush
</div>
