<div>
    @include('livewire.metadata.record-card.extracurricular.partials.sport_and_hobby_component')
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('sport_destroy','sport')
    </script>
@endpush
