<div>
    @include('livewire.metadata.record-card.extracurricular.partials.sport_and_hobby_component')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('hobby_destroy','hobby')
    </script>
@endpush
