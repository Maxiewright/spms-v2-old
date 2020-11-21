@extends('../layout/' . $layout)

@section('subhead')
    <title>Serviceperson Dashboard</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5"> Welcome ____ </h2>
                    <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @foreach (Auth::user()->getRoleNames() as $role)
                        <li>{{$role}}</li>
                    @endforeach
                </div>
            </div>
    </div>
@endsection
