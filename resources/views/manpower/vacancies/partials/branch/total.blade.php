<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold">Total</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->WO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->WO1 - $strength->WO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->WO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->WO2 - $strength->WO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->SSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->SSgt - $strength->SSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->Sgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->Sgt - $strength->Sgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->Cpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->Cpl - $strength->Cpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->LCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->LCpl - $strength->LCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->Pte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->Pte - $strength->Pte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td class="text-bold">{{$establishment->total}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td class="text-bold">{{$establishment->total - $strength->total}}</x-tables.vacancy.vacancy-td>
</tr>
