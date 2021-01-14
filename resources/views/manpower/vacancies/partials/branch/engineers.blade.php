<tr class="hover:bg-gray-200">
    <td scope="row" class="border">Engineers</td>
    {{--W01--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrWO1}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrWO1 - $strength->engrWO1}}</x-tables.vacancy.vacancy-td>
    {{--W02--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrWO2}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrWO2 - $strength->engrWO2}}</x-tables.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrSSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrSSgt - $strength->engrSSgt}}</x-tables.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrSgt}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrSgt - $strength->engrSgt}}</x-tables.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrCpl - $strength->engrCpl}}</x-tables.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrLCpl}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrLCpl - $strength->engrLCpl}}</x-tables.vacancy.vacancy-td>
    {{--Pte--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrPte}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrPte - $strength->engrPte}}</x-tables.vacancy.vacancy-td>
    {{--Total--}}
    <x-tables.vacancy.establishment-td>{{$establishment->engrTotal}}</x-tables.vacancy.establishment-td>
    <x-tables.vacancy.vacancy-td>{{$establishment->engrTotal - $strength->engrTotal}}</x-tables.vacancy.vacancy-td>
</tr>
