<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">SFOD</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodWO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodWO1 - $strength->sfodWO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodWO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodWO2 - $strength->sfodWO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodSSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodSSgt - $strength->sfodSSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodSgt - $strength->sfodSgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodCpl - $strength->sfodCpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodLCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodLCpl - $strength->sfodLCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodPte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodPte - $strength->sfodPte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td>{{$establishment->sfodTotal}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->sfodTotal - $strength->sfodTotal}}</x-table.vacancy.vacancy-td>
</tr>
