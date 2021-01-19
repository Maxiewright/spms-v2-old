<div class="pr-2" x-data="{isVisible: true}" @click.away="isVisible = false">
    <input autocomplete="off" id="serviceperson-input"
           wire:model.debounce.300ms="search"
           class="input w-full border mt-1" type="text" placeholder="search"
           @focus="isVisible = true"
           @keydown.escape.window="isVisible = false"
           @keydown="isVisible = true"

    />
    @if (strlen($search >= 3))
        <div class="absolute z-50 bg-gray-100 rounded w-64 mt-1" x-show="isVisible">
        @if (count($searchResults) > 0 )
            <ul class="pl-2 mt-1" style="list-style: none">
                @foreach ($searchResults as $searchResult)
                    <li class="border-b border-gray-300 cursor-pointer serviceperson-name">
                        <div
                           class="block hover:bg-theme-1 hover:text-white flex items-center transition ease-in-out duration-150 px-2 py-2">
                            <img src="{{$searchResult->image}}" alt="" class="w-10">
                            <span >{{$searchResult->name}}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <ul class="pl-2 mt-1" style="list-style: none">
                <li class="border-b border-gray-300">
                    <a href="#"
                       class="block hover:bg-theme-1 hover:text-white flex items-center transition ease-in-out duration-150 px-2 py-2">
                        <span>No Results for {{$search}}</span>
                    </a>
                </li>
            </ul>
        @endif
        </div>
    @endif


</div>
@section('')
    @push('livewire-scripts')
        <script>
            $('.serviceperson-name').ready(function () {
                $('.serviceperson-name').on('click', function (event) {
                    alert('shit')
                })
            })

            $('.serviceperson-name').on('click', function (e) {
                $('#serviceperson-input').val($(this).val());
                $('#serviceperson-input').attr($(this).val());
            });
        </script>
    @endpush
@endsection

