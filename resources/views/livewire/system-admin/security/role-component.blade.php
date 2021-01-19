<div>

    @else
{{--        <x-metadata.create title="{{$title}}">--}}
{{--            <x-slot name="createFields">--}}
{{--                <div class="col-sm-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <input wire:model="name" type="text"--}}
{{--                               class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}">--}}
{{--                        @error('name')--}}
{{--                        <div class="invalid-feedback">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-8">--}}
{{--                    <x-form.input.livewire-select--}}
{{--                        wire:model="rolePermissions" id="rolePermissions"--}}
{{--                        name="rolePermissions" select-type="label"--}}
{{--                        :message="$permissions"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </x-slot>--}}
{{--        </x-metadata.create>--}}
    @endif

    <x-tables.data-table title="{{$title}}">
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Permissions</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                {{$role ?? ''}}
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name}}</td>
                    <td style=" white-space: normal !important; word-wrap: break-word; ">
                        @foreach($row->permissions as $key => $item)
                            <span class="badge badge-info">{{ $item->name }}</span>
                        @endforeach
                    </td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>

                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>


