<div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20">
    <x-buttons.multi-step-nav wire:click="submit()" step="1" title="Basic Info" />
    <x-buttons.multi-step-nav wire:click="submit()" step="2" title="Contact" />
    <x-buttons.multi-step-nav wire:click="submit()" step="3" title="Identification" />
    <x-buttons.multi-step-nav wire:click="submit()" step="4" title="Service Data" />
    <x-buttons.multi-step-nav wire:click="submit()" step="5" title="Medical" />
    <x-buttons.multi-step-nav wire:click="submit()" step="6" title="Education" />
    <x-buttons.multi-step-nav wire:click="submit()" step="7" title="Extracurricular" />
    <x-buttons.multi-step-nav wire:click="submit()" step="8" title="Dependents" />
    <x-buttons.multi-step-nav wire:click="submit()" step="9" title="Emergency Contact" />
    <x-buttons.multi-step-nav wire:click="submit()" step="10" title="Review and Submit" />
    <div class="wizard__line hidden lg:block w-11/12 bg-gray-200 dark:bg-dark-1 absolute mt-5"></div>
</div>
{{--            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">--}}
{{--                <button class="w-10 h-10 rounded-full button text-white bg-theme-1">1</button>--}}
{{--                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Basic Info</div>--}}
{{--            </div>--}}
{{--            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">--}}
{{--                <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 dark:bg-dark-1">2</button>--}}
{{--                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Identification</div>--}}
{{--            </div>--}}
