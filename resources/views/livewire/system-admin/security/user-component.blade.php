<div>
    <x-tables.data-table title="{{$title}}">
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
{{--                    --}}
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
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
