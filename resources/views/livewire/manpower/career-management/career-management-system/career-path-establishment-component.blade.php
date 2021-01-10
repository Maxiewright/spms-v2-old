<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_career_path_establishment_modal')
        @endif
{{--        filters--}}
        <x-slot name="filters">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterCareerPath" class="form-control custom-select">
                        <option value="">Filter By Branch</option>
                        @foreach ($careerPaths as $careerPath)
                            <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterRank" class="form-control custom-select">
                        <option value="">Select Rank</option>
                        @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->regiment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
{{--        table--}}
        <x-slot name="thead">
            <th>Career Path</th>
            <th>Rank</th>
            <th>Establishment</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->careerPath->name ?? ''}}</td>
                    <td>{{$row->rank->regiment_slug ?? ''}}</td>
                    <td>{{$row->establishment ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>


