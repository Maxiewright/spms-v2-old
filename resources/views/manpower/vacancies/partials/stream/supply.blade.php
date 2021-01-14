<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Supply</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyWO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyWO1 - $strength->supplyWO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyWO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyWO2 - $strength->supplyWO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplySSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplySSgt - $strength->supplySSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplySgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplySgt - $strength->supplySgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyCpl - $strength->supplyCpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyLCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyLCpl - $strength->supplyLCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyPte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyPte - $strength->supplyPte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td>{{$establishment->supplyTotal}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->supplyTotal - $strength->supplyTotal}}</x-tables.vacancy.vacancy-td>
</tr>
