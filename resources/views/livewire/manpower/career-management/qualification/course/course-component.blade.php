<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                <input type="hidden" wire:model="selectId">
                @include('livewire.manpower.career-management.qualification.course.partials.course_create_and_update_form_fields')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.manpower.career-management.qualification.course.partials.course_create_and_update_form_fields')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        {{--            filter by type--}}
        <x-slot name="filter">
            <div wire:ignore>
                <select wire:model="filter" class="form-control custom-select">
                    <option {{$institutionId == null ? 'selected': ''}} value="">Filter By Institution</option>
                    @foreach($institutions as $institution)
                        <option {{$institutionId == $institution->id ? 'selected': ''}} value="{{$institution->id}}">{{$institution->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Short Name</th>
            <th>Institutions</th>
            <th>Description</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->slug ?? ''}}</td>
                    <td>
                        <div id="accordion">
                            <button class="btn btn-link mb-3" data-toggle="collapse" data-target="#institutions{{$loop->index}}" aria-expanded="true" aria-controls="institutions{{$loop->index}}">
                              {{$row->slug}} Institutions
                            </button>
                            <div class="collapse" id="institutions{{$loop->index}}">
                            @foreach($row->institution as $institution)
                                <ul class="list-group list-group-flush" style="list-style: none">
                                    <li class="mb-1 d-flex list-group-item justify-content-between list-group-item-action">{{$loop->iteration.'. '. $institution->name}}
                                        <a href="#" wire:click="$emit('course_institution_detach',{{$row->id}},{{$institution->id}})">
                                            <i class="fa fa-sm fa-unlink text-danger"></i>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                            </div>
                        </div>
                    </td>
                    <td>{{$row->description ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-metadata.metadata-component>
</div>

@push('livewire-scripts')
    <script>
        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });
        livewireDeleteConfirmation('course_destroy','course')
        livewireDetachConfirmation('course_institution_detach')
    </script>
@endpush
