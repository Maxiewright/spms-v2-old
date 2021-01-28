<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Provost</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostWO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostWO1 - $strength->provostWO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostWO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostWO2 - $strength->provostWO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostSSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostSSgt - $strength->provostSSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostSgt - $strength->provostSgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostCpl - $strength->provostCpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostLCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostLCpl - $strength->provostLCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostPte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostPte - $strength->provostPte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td>{{$establishment->provostTotal}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->provostTotal - $strength->provostTotal}}</x-table.vacancy.vacancy-td>
</tr>
