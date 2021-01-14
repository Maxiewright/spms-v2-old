<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Operations</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsWO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsWO1 - $strength->operationsWO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsWO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsWO2 - $strength->operationsWO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsSSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsSSgt - $strength->operationsSSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsSgt - $strength->operationsSgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsCpl - $strength->operationsCpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsLCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsLCpl - $strength->operationsLCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsPte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsPte - $strength->operationsPte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td>{{$establishment->operationsTotal}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->operationsTotal - $strength->operationsTotal}}</x-tables.vacancy.vacancy-td>
</tr>
