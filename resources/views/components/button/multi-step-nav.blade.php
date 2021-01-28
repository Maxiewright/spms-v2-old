<div wire:click.prevent="goToStep({{$thisStep}})"
     class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10" {{$attributes}}>
    <button
        class="w-10 h-10 rounded-full button
        {{$step == $thisStep ? 'text-green-700 bg-yellow-500' : 'text-gray-600 bg-gray-200 dark:bg-dark-1'}} "
    >
        {{$thisStep}}
    </button>
    <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto
        {{$step == $thisStep ? 'text-green-700' : 'text-gray-700 dark:text-gray-600'}}"
    >
        {{$title}}
    </div>
</div>
