<tr class="hover:bg-gray-200">
    <td scope="row" class="border text-bold whitespace-no-wrap">HHS</td>
    {{--W01--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthWO1}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthWO1 - $strength->healthWO1}}</x-table.vacancy.vacancy-td>
    {{--W02--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthWO2}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthWO2 - $strength->healthWO2}}</x-table.vacancy.vacancy-td>
    {{--SSgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthSSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthSSgt - $strength->healthSSgt}}</x-table.vacancy.vacancy-td>
    {{--Sgt--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthSgt}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthSgt - $strength->healthSgt}}</x-table.vacancy.vacancy-td>
    {{--Cpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthCpl - $strength->healthCpl}}</x-table.vacancy.vacancy-td>
    {{--LCpl--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthLCpl}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthLCpl - $strength->healthLCpl}}</x-table.vacancy.vacancy-td>
    {{--Pte--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthPte}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthPte - $strength->healthPte}}</x-table.vacancy.vacancy-td>
    {{--Total--}}
    <x-table.vacancy.establishment-td>{{$establishment->healthTotal}}</x-table.vacancy.establishment-td>
    <x-table.vacancy.vacancy-td>{{$establishment->healthTotal - $strength->healthTotal}}</x-table.vacancy.vacancy-td>
</tr>
