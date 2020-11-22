<div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
    <div class="flex items-center justify-center lg:justify-start mb-1">
        <div class="mr-2 w-full flex">
            AGE: <span class="ml-3 font-medium">{{$serviceperson->nationalIdCard->age}}</span>
        </div>
    </div>
    <div class="flex items-center justify-center lg:justify-start mb-1">
        <div class="mr-2 w-full flex">
            BLOOD TYPE: <span class="ml-3 font-medium">{{$serviceperson->biodata->BloodType->slug}}</span>
        </div>
    </div>
    <div class="flex items-center justify-center lg:justify-start mb-1">
        <div class="mr-2 w-full flex">
            MARITAL STATUS: <span class="ml-3 font-medium">{{$serviceperson->maritalStatus->name}}</span>
        </div>
    </div>
    <div class="flex items-center justify-center lg:justify-start">
        <div class="mr-2 w-full flex">
            RELIGION: <span class="ml-3 font-medium">{{$serviceperson->religion->name}}</span>
        </div>
    </div>
</div>
