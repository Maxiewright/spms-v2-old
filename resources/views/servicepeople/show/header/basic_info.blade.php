<div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
    <img alt=""
         class="rounded-full"
         src="{{ $serviceperson->image }}"
         title="{{$serviceperson->name}}">
</div>
<div class="ml-5">
    <div class="truncate sm:whitespace-normal font-medium text-lg">{{ $serviceperson->name}}</div>
    <div class="text-gray-600">{{$serviceperson->job->title->name}}</div>
</div>
