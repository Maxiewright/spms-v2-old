<x-tables.data-table title="CROD">
    <x-slot name="filter">
        <div class="col ml-2">
            <input class="form-control col" type="date" wire:model="startDate">
            <small>Start Date</small>
        </div>
        <div class="co ml-2">
            <input class="form-control col" type="date" wire:model="endDate">
            <small>End Date</small>
        </div>
        <div class="col ml-2">
            <select class="form-control custom-select col" wire:model="rankId" name="" id="">
                <option value="">Filter By Rank</option>
                @foreach ($ranks as $rank)
                    <option value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
                @endforeach
            </select>
        </div>
    </x-slot>
    <x-slot name="tableHeader">
        <th>#</th>
        <th>Serviceperson</th>
        <th>CROD</th>
        <th>Resettlement</th>
        <th>Action</th>
    </x-slot>
    <x-slot name="tableBody">
        @forelse($servicepeople as $serviceperson)
            <tr>
                <td class="w40">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                        <span class="custom-control-label">&nbsp;</span>
                    </label>
                </td>
                {{--                                Serviceperson basic information --}}
                <td class="d-flex">
                    <span class="avatar avatar-blue" data-toggle="tooltip" title="" data-original-title="{{$serviceperson->name}}">
                        <img src="{{$serviceperson->image ?? ''}}" alt="">
                    </span>
                    <div class="ml-3">
                        <h6 class="mb-0"><a href="{{route('servicepeople.show', $serviceperson->number)}}"> {{$serviceperson->name}}</a></h6>
                       <span class="text-muted">
                                {{$serviceperson->job ?? ''}} - {{$serviceperson->company_slug ?? ''}}
                        </span>
                    </div>
                </td>
                <td>{{$serviceperson->crod->format('d M Y')}}</td>
                <td>{{$serviceperson->resettlementCourse ? 'Completed' : 'Not yet complete'}}</td>
                <td><i class="fe fe-eye"></i></td>
            </tr>
        @empty
            <tr>
                <td colspan="5"> No Records Found</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $servicepeople->links() }}
    </x-slot>
</x-tables.data-table>

