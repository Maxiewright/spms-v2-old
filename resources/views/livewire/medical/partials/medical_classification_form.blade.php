<div class="col-3">
    <input wire:model="serviceperson_number"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('serviceperson_number') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Serviceperson Number"
    >
    @error('serviceperson_number')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select_physical_capacity"  class="col-1">
    <select wire:model="physical_capacity" wire:key="1" data-container="#select_physical_capacity" class="form-control selectpicker mb-2 mr-sm-2 @error('physical_capacity') is-invalid @enderror">
        <option {{$physical_capacity == '' ? 'selected' : ''}} value="">P</option>
        @foreach ($grades as $grade)
            <option {{$physical_capacity == $grade->id ? 'selected' : ''}}
                  wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >
                {{$grade->degree}}</option>
        @endforeach
    </select>
    @error('physical_capacity')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select_upper_limbs" class="col-1">
    <select wire:model="upper_limbs" wire:key="2" data-container="#select_upper_limbs" class="form-control mb-2 mr-sm-2 @error('upper_limbs') is-invalid @enderror">
        <option {{$upper_limbs == '' ? 'selected' : ''}} value="">U</option>
        @foreach ($grades as $grade)
            <option {{$upper_limbs == $grade->id ? 'selected' : ''}}
                    wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('upper_limbs')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" wire:key="3"class="col-1">
    <select wire:model="locomotion" data-container="#select" class="form-control mb-2 mr-sm-2 @error('locomotion') is-invalid @enderror">
        <option {{$locomotion== '' ? 'selected' : ''}} value="">L</option>
        @foreach ($grades as $grade)
            <option {{$locomotion == $grade->id ? 'selected' : ''}}
                    wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('locomotion')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" class="col-1">
    <select wire:model="hearing_left" data-container="#select"  class="form-control mb-2 mr-sm-2 @error('hearing_left') is-invalid @enderror">
        <option {{$hearing_left == '' ? 'selected' : ''}} value="">H</option>
        @foreach ($grades as $grade)
            <option {{$hearing_left == $grade->id ? 'selected' : ''}}
                    wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('hearing_left')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" class="col-1">
    <select wire:model="hearing_right" data-container="#select" class="form-control mb-2 mr-sm-2 @error('hearing_right') is-invalid @enderror">
        <option {{$hearing_right == '' ? 'selected' : ''}} value="">H</option>
        @foreach ($grades as $grade)
            <option {{$hearing_right == $grade->id ? 'selected' : ''}}
                    wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('hearing_right')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" class="col-1">
    <select wire:model="eyesight_left" data-container="#select" class="form-control mb-2 mr-sm-2 @error('eyesight_left') is-invalid @enderror">
        <option {{$eyesight_left == '' ? 'selected' : ''}} value="">E</option>
        @foreach ($grades as $grade)
            <option {{$eyesight_left == $grade->id ? 'selected' : ''}}
                    wire:key="{{$loop->iteration}}" value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('eyesight_left')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" class="col-1">
    <select wire:model="eyesight_right" data-container="#select" class="form-control mb-2 mr-sm-2 @error('eyesight_right') is-invalid @enderror">
        <option {{$eyesight_right == '' ? 'selected' : ''}} value="">E</option>
        @foreach ($grades as $grade)
            <option {{$eyesight_right == $grade->id ? 'selected' : ''}}
                    value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('eyesight_right')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select" class="col-1">
    <select wire:model="mental_capacity" data-container="#select" class="form-control mb-2 mr-sm-2 @error('mental_capacity') is-invalid @enderror">
        <option {{$mental_capacity == '' ? 'selected' : ''}} value="">M</option>
        @foreach ($grades as $grade)
            <option {{$mental_capacity == $grade->id ? 'selected' : ''}}
                    value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('mental_capacity')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div wire:ignore id="select"  class="col-1">
    <select wire:model="stability" data-container="#select" class="form-control mb-2 mr-sm-2 @error('stability') is-invalid @enderror">
        <option {{$stability== '' ? 'selected' : ''}} value="">S</option>
        @foreach ($grades as $grade)
            <option {{$stability == $grade->id ? 'selected' : ''}}
                    value="{{$loop->iteration}}"
            >{{$grade->degree}}</option>
        @endforeach
    </select>
    @error('stability')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="col-2">
    <input wire:model="performed_on"
           type="date"
           class="form-control mb-2 mr-sm-2 @error('performed_on') is-invalid @enderror"
           title="{{$title}}"
    >
    @error('performed_on')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="col-2">
    <input wire:model="performed_at"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('performed_at') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Performed At"
    >
    @error('performed_at')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="col-4">
    <input wire:model="medical_officer"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('medical_officer') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Medical Officer Service Number"
    >
    @error('medical_officer')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="col-3">
    <input wire:model="medical_officer_remarks"
           type="text"
           class="form-control mb-2 mr-sm-2 @error('medical_officer_remarks') is-invalid @enderror"
           title="{{$title}}"
           placeholder="Short Remarks"
    >
    @error('medical_officer_remarks')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
