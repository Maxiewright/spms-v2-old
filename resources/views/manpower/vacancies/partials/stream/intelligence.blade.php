<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">Intelligence</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceWO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceWO1 - $strength->intelligenceWO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceWO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceWO2 - $strength->intelligenceWO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceSSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceSSgt - $strength->intelligenceSSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceSgt - $strength->intelligenceSgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceCpl - $strength->intelligenceCpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceLCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceLCpl - $strength->intelligenceLCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligencePte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligencePte - $strength->intelligencePte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td>{{$establishment->intelligenceTotal}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->intelligenceTotal - $strength->intelligenceTotal}}</x-table.vacancy.vacancy-td>
</tr>
