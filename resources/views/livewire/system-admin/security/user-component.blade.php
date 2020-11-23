<div>
{{--    @if ($updateMode)--}}
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input wire:model="userServicepersonName" type="text"
                               class="form-control mb-2 mr-sm-2 @error('userServicepersonName') is-invalid @enderror" title="{{$title}}">
                        @error('userServicepersonName')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div >

                <div wire:ignore class="col-sm-8" id="updateUserRole">
                    <input type="hidden" wire:model="userRoleIds" id="userRoleIds" data-name="{{$userRoleIds}}">
                    <select wire:key="userRoleIds" class=" form-control select2
                    @error('userRoles.*') is-invalid @enderror"
                         name="userRoles[]" id="userRoles" multiple required
                    >
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" >{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('userRoles.*')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </x-slot>
        </x-metadata.update>
{{--    @endif--}}

    <x-metadata.metadata-component title="{{$title}}">
        <x-slot name="tableHeaders">
            <th>Serviceperson</th>
            <th>Roles</th>
            <th>Contact</th>
            <th>Status</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td class="d-flex">
                            <span class="avatar avatar-blue" data-toggle="tooltip" title=""
                                  data-original-title="Avatar Name">
                                <img src="{{$row->serviceperson->image}}" alt="">
                            </span>
                        <div class="ml-3">
                            <h6 class="mb-0">
                                <a href="{{route('servicepeople.show', $row->serviceperson->number)}}">
                                    {{$row->serviceperson->name}}
                                </a>
                            </h6>
                            <span class="text-muted">
                            {{$row->serviceperson->job}} - {{$row->serviceperson->company_slug}}
                        </span>
                        </div>
                    </td>
                    <td>
                        @foreach($row->roles as $key => $item)
                            <span class="badge badge-info">{{ $item->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="ml-3">
                            <h6 class="mb-0">
                                @if(count($row->serviceperson->phoneNumbers) > 0)
                                    @foreach($row->serviceperson->phoneNumbers->slice(0 ,1) as $phone)
                                        <a href="tel:{{$phone->number}}"><span><li style="list-style: none">{{$phone->formatted_number ?? ''}}</li></span></a>
                                    @endforeach
                                @else
                                    <span> No Phone number Submitted </span>
                                @endif
                            </h6>

                            @foreach($row->serviceperson->emailAddresses->slice(0 ,1) as $email)
                                <a href="mailto:{{$email->email}}"><span class="text-muted"><li style="list-style: none">{{$email->email}}</li></span></a>
                            @endforeach
                        </div>
                    </td>
                    <td><span>{{$row->serviceperson->currentStatus}}</span></td>
                    <td wire:click="reloadUpdateField()">
                        <button wire:click="edit({{$row->id}})" class="btn btn-icon btn-sm editRoles"><i class="fa fa-edit text-danger"></i></button>
                    </td>
{{--                    <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>--}}
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true,
                theme: 'bootstrap4',
            });

            $('.select2').on('change', function (e) {
                let elementName = $(this).attr('id');
                var data = $(this).select2("val");
            @this.set(elementName, data);
            });

            $(function() {
                $('#main_content').on('click', '.editRoles' ,function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    const data = $('#userRoleIds').val().split(",") ;
                    console.log(Array.from(data))
                    $('#userRoles').val(Array.from(data)).change();
                })
            });


        });
    </script>
@endpush
