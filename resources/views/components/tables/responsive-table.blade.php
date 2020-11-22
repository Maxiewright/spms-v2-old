<div class="col-span-12 intro-y box mt-5">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">{{$title}}</h2>
        <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
            <div class="mr-3">{{$options}}</div>
        </div>
    </div>
    <div class="p-5">
        <div class="preview">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        {{$thead}}
                    </tr>
                    </thead>
                    <tbody>
                        {{$tbody}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
