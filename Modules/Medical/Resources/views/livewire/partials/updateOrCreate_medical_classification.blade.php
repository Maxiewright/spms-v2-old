<x-crud.livewire-crud-modal title="{{$title}}">
    {{-- Serviceperson --}}
    <label class="block">
        <span class="text-gray-700">Serviceperson</span>
        <input wire:model="serviceperson_number"
               type="text" class="input w-full border mt-1"
               placeholder="Serviceperson Number"
        >
        @error('medical_officer') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

    {{--PULHHEEMS: Row 1--}}
    <div class="flex flex-row space-x-2 mt-4">
        <div>
            <select wire:model="physical_capacity" class="input w-full border mt-1">
                <option>P</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="upper_limbs" class="input w-full border mt-1">
                <option>U</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="locomotion" class="input w-full border mt-1">
                <option>L</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="hearing_left" class="input w-full border mt-1">
                <option>H</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="hearing_right" class="input w-full border mt-1">
                <option>H</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
    </div>

    {{--PULHHEEMS: Row 2--}}
    <div class="flex flex-row space-x-2">
        <div>
            <select wire:model="eyesight_left" class="input w-full border mt-1">
                <option>E</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="eyesight_right" class="input w-full border mt-1">
                <option>E</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>


        <div>
            <select wire:model="mental_capacity" class="input w-full border mt-1">
                <option>M</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
        <div>
            <select wire:model="stability" class="input w-full border mt-1">
                <option>S</option>
                @include('medical::livewire.partials.grades')
            </select>
        </div>
    </div>

    <div class="flex flex-row">

        {{-- Performed on --}}
        <label class="block mt-3">
            <span class="text-gray-700">Performed On</span>
            <input wire:model="performed_on"
                   type="date" class="input w-full border mt-1"
                   placeholder="Performed On"
            >
            @error('performed_on') <span class="text-red-500">{{ $message }}</span>@enderror
        </label>

        {{-- Performed at --}}
        <label class="block mt-3">
            <span class="text-gray-700">Performed At</span>
            <input wire:model="performed_at"
                   type="text" class="input w-full border mt-1"
                   placeholder="Performed On"
            >
            @error('performed_at') <span class="text-red-500">{{ $message }}</span>@enderror
        </label>
    </div>


    {{-- Medical Officer --}}
    <label class="block mt-4">
        <span class="text-gray-700">Performed By</span>
        <input wire:model="medical_officer"
               type="text" class="input w-full border mt-1"
               placeholder="Performed By / Medical Officer"
        >
        @error('medical_officer') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

    {{-- Medical Officer Remarks --}}
    <label class="block mt-4">
        <span class="text-gray-700">Short Remarks</span>
        <input wire:model="medical_officer_remarks"
               type="text" class="input w-full border mt-1"
               placeholder="Short Remarks"
        >
        @error('medical_officer_remarks') <span class="text-red-500">{{ $message }}</span>@enderror
    </label>

</x-crud.livewire-crud-modal>
