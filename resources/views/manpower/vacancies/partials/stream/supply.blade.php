<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Supply</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyWO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyWO1 - $strength->supplyWO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyWO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyWO2 - $strength->supplyWO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplySSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplySSgt - $strength->supplySSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplySgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplySgt - $strength->supplySgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyCpl - $strength->supplyCpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyLCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyLCpl - $strength->supplyLCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyPte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyPte - $strength->supplyPte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td>{{$establishment->supplyTotal}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->supplyTotal - $strength->supplyTotal}}</x-table.vacancy.vacancy-td>
</tr>
