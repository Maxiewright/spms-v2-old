<div class="row clearfix">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Activity Log</div>
                <div class="card-options">
                    <div class="pr-2" >
                        <form>
                            <div class="input-group">
                                <label>
                                    <input wire:model="search" class="form-control" type="text" placeholder="Find Job..."/>
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="pr-2" >
{{--                        {{$activities->links()}}--}}
                    </div>
                    <div>
                        <a href="{{route('jobs.create')}}" class="btn btn-primary">Create Job</a>
                    </div>
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table" id="servicepeople">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Causer</th>
                            <th>Action</th>
                            <th>Model</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($activities)
                            @foreach ($activities as $activity)
                                <tr>
                                    <td class="w40">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>
                                    <td>
                                        <span>{{$activity->causer->serviceperson->military_name ?? ''}}</span>
                                    </td>
                                    <td>
                                        <span>{{$activity->description ?? ''}}</span>
                                    </td>
                                    <td>
                                        <span>{{$activity->subject->full_name ?? ''}}</span>
                                    </td>
                                    <td>
                                        <span>{{$activity->changes ?? ''}}</span>
                                    </td>
                                    <td>
                                        <button  class="btn btn-icon btn-sm" title="View"><a href=""><i class="fa fa-eye"></i></a></button>
                                        <button  class="btn btn-icon btn-sm" title="View"><a href=""><i class="fa fa-trash"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
