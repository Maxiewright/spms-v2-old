<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ucfirst($title)}}</div>
            <div class="card-options">
                <div class="pr-2 row">
                    {{$filter}}
                    <form>
                        <div class="input-group">
                            <label>
                                <input wire:model="search" class="form-control"
                                       type="text" placeholder="
                                               Search {{ucfirst($title)}}..."
                                />
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="pb-3">
                {{$slot}}
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table"
                       id="servicepeople">
                    <thead>
                    <tr>
                        {{$tableHeader}}
                    </tr>
                    </thead>
                    <tbody>
                    {{$tableBody}}
                    </tbody>
                </table>
            </div>
            {{$pagination}}
        </div>
    </div>
</div>
