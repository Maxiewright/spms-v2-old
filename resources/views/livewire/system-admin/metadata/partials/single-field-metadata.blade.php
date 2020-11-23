<div>
{{--    @if ($updateMode)--}}
{{--        <x-metadata.update title="{{$title}}">--}}
{{--            <x-slot name="updateFields">--}}
{{--                <div class="flex form-group">--}}
{{--                    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}">--}}
{{--                    @error('name')--}}
{{--                    <div class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </x-slot>--}}
{{--        </x-metadata.update>--}}
{{--    @else--}}
{{--        <x-metadata.create title="{{$title}}">--}}
{{--            <x-slot name="createFields">--}}
{{--                <div class="form-group">--}}
{{--                    <input wire:model="name" type="text" class="form-control mb-2 mr-sm-2 @error('name') is-invalid @enderror" title="{{$title}}">--}}
{{--                    @error('name')--}}
{{--                    <div class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </x-slot>--}}
{{--        </x-metadata.create>--}}
{{--    @endif--}}
    <x-tables.data-table title="{{$title}}">
        <x-slot name="filters"></x-slot>
        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Inserted</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Updated</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap text-center">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="border-b whitespace-no-wrap w40" >
                        {{$loop->iteration}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->name}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap w-56">
                        <div class="flex justify-center items-center">
                            <a wire:click="edit({{$row->id}})"
                               class="flex items-center mr-3"
                               href="javascript:;">
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>Edit
                            </a>
                            <a wire:click="$emit('{{str_replace(' ', '_', strtolower($title)).'_destroy'}}', {{$row->id}})"
                               class="flex items-center text-theme-6"
                               href="javascript:;"
                               data-toggle="modal"
                               data-target="#delete-confirmation-modal">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>

</div>


