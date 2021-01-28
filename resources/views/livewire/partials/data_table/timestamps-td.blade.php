@if ($timestamps == true)
    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
@endif
