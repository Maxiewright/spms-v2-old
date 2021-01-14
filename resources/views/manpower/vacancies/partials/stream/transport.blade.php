<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Transport</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportWO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportWO1 - $strength->transportWO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportWO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportWO2 - $strength->transportWO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportSSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportSSgt - $strength->transportSSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportSgt - $strength->transportSgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportCpl - $strength->transportCpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportLCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportLCpl - $strength->transportLCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportPte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportPte - $strength->transportPte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td>{{$establishment->transportTotal}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->transportTotal - $strength->transportTotal}}</x-tables.vacancy.vacancy-td>
</tr>
