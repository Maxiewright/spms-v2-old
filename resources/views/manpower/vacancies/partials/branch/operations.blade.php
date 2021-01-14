<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold">Operations</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsWO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsWO1 - $strength->opsWO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsWO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsWO2 - $strength->opsWO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsSSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsSSgt - $strength->opsSSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsSgt - $strength->opsSgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsCpl - $strength->opsCpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsLCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsLCpl - $strength->opsLCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsPte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsPte - $strength->opsPte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td>{{$establishment->opsTotal}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->opsTotal - $strength->opsTotal}}</x-tables.vacancy.vacancy-td>
</tr>
