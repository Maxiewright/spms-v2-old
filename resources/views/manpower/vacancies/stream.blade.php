@extends('../layout/' . $layout)

@section('subhead')
    <title>Manpower | Stream Vacancy</title>
@endsection

@section('subcontent')
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Enlisted Stream Vacancy</h2>
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
                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="sticky top-0 border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="sticky top-0 border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcan.</x-table.th>

                        <x-table.th class="border text-bold text-green-500">Est.</x-table.th>
                        <x-table.th class="border text-bold text-red-500">Vcan.</x-table.th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('manpower.vacancies.partials.stream.combat-support')
                    @include('manpower.vacancies.partials.stream.operations')
                    @include('manpower.vacancies.partials.stream.intelligence')
                    @include('manpower.vacancies.partials.stream.sfod')
                    @include('manpower.vacancies.partials.stream.provost')
                    @include('manpower.vacancies.partials.stream.clerical-legal-hr')
                    @include('manpower.vacancies.partials.stream.ict')
                    @include('manpower.vacancies.partials.stream.hhs')
                    @include('manpower.vacancies.partials.stream.musical')
                    @include('manpower.vacancies.partials.stream.supply')
                    @include('manpower.vacancies.partials.stream.transport')
                    @include('manpower.vacancies.partials.stream.food-and-catering')
                    @include('manpower.vacancies.partials.stream.engr-artisan')
                    @include('manpower.vacancies.partials.stream.engr-specialist')
                    @include('manpower.vacancies.partials.stream.engr-technician')
                    @include('manpower.vacancies.partials.stream.total')

                    </tbody>
                </table>
            </div>
        </div>
@endsection



