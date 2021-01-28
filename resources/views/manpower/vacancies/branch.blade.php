@extends('../layout/' . $layout)

@section('subhead')
    <title>Manpower | Branch Vacancy</title>
@endsection

@section('subcontent')
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Enlisted Branch Vacancy</h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <div class="mr-3">As at</div>
            </div>
        </div>
        <div class="p-5" id="hoverable-table">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <x-table.th rowspan="2" class="border text-center"></x-table.th>
                        <x-table.th colspan="2" class="border text-center">WO1</x-table.th>
                        <x-table.th colspan="2" class="border text-center">WO2</x-table.th>
                        <x-table.th colspan="2" class="border text-center">SSgt</x-table.th>
                        <x-table.th colspan="2" class="border text-center">Sgt</x-table.th>
                        <x-table.th colspan="2" class="border text-center">Cpl</x-table.th>
                        <x-table.th colspan="2" class="border text-center">LCpl</x-table.th>
                        <x-table.th colspan="2" class="border text-center">Pte</x-table.th>
                        <x-table.th colspan="2" class="border text-center">Total</x-table.th>
                    </tr>
                    <tr>
                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcnt.</x-table.th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('manpower.vacancies.partials.branch.operations')
                    @include('manpower.vacancies.partials.branch.administration')
                    @include('manpower.vacancies.partials.branch.logistics')
                    @include('manpower.vacancies.partials.branch.engineers')
                    @include('manpower.vacancies.partials.branch.total')
                    </tbody>
                </table>
            </div>
        </div>
@endsection



