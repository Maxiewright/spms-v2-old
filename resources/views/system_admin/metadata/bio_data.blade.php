<x-layouts.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#blood-type" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Blood Type
        </a>
        <a data-toggle="tab" data-target="#eye-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Eye Colour
        </a>
        <a data-toggle="tab" data-target="#hair-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Hair Colour
        </a>
        <a data-toggle="tab" data-target="#skin-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Skin Colour
        </a>
        <a data-toggle="tab" data-target="#height-and-weight" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Height & Weight
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="blood-type">

        </div>
        <div class="tab-content__pane" id="eye-colour">

        </div>
        <div class="tab-content__pane" id="hair-colour">

        </div>
        <div class="tab-content__pane" id="skin-colour">

        </div>
        <div class="tab-content__pane" id="height-and-weight">

        </div>
    </x-slot>
</x-layouts.side-menu-tabs>

