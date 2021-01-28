<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold">Total</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->WO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->WO1 - $strength->WO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->WO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->WO2 - $strength->WO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->SSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->SSgt - $strength->SSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->Sgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->Sgt - $strength->Sgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->Cpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->Cpl - $strength->Cpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->LCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->LCpl - $strength->LCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->Pte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->Pte - $strength->Pte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td class="text-bold">{{$establishment->total}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td class="text-bold">{{$establishment->total - $strength->total}}</x-table.vacancy.vacancy-td>
</tr>
