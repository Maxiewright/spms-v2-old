<div>
    <td class="border-b whitespace-no-wrap w-56">
        <div class="flex justify-center items-center">
            <a wire:click="edit({{$id}}, '{{$id2}}')"
               class="flex items-center mr-3 hover:underline"
               href="javascript:;">
                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>Edit
            </a>

            <a wire:click="confirmDelete({{$id}}, '{{$id2}}')"
               class="flex items-center text-theme-6 hover:underline"
               href="javascript:;"
            >
                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
            </a>
        </div>
    </td>
</div>
