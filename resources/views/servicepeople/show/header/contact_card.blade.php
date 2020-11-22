{{-- BEGIN: Phone Number--}}
@foreach($serviceperson->phoneNumbers as $phone)
    <div class="truncate sm:whitespace-normal flex items-center mb-2">
        <i data-feather="phone" class="w-4 h-4 mr-2"></i>
        <a class="" href="tel:{{$phone->number}}">{{$phone->formatted_number}}</a>
        @can('create', \App\Models\Serviceperson\PhoneNumber::class)
            @if(count($serviceperson->phoneNumbers) < 3)
                <a class="ml-5" href="{{route('serviceperson_phones.create')}}" data-remote="true">
                    <i style="" data-feather="plus-square"></i>
                </a>
            @endif
        @endcan
        @can('delete', $phone)
            @if(count($serviceperson->phoneNumbers) > 1)
                <a class="ml-5" href="{{route('serviceperson_phones.destroy', $phone->id)}}" data-remote="true">
                    <i style="" data-feather="minus-square"></i>
                </a>
            @endif
        @endcan
    </div>
@endforeach
{{-- END: Phone Number--}}

{{-- BEGIN: Email Address--}}
@foreach($serviceperson->emailAddresses as $email)
    <div class="truncate sm:whitespace-normal flex items-center  mb-2">
        <i data-feather="mail" class="w-4 h-4 mr-2"></i>
        <a href="mailto:{{$email->email}}">{{$email->email}}</a>
        @can('update', $email)
            @if ($email->pivot->email_type_id == 1)
                <a class="ml-5" href="{{route('serviceperson_emails.edit', $email->id)}}" data-remote="true">
                    <i style="" data-feather="edit"></i>
                </a>
            @endif
        @endcan
        @can('create', \App\Models\Serviceperson\EmailAddress::class)
            @if(count($serviceperson->emailAddresses) < 2)
                <a class="ml-5" href="{{route('serviceperson_emails.create')}}" data-remote="true">
                    <i style="" data-feather="plus-square"></i>
                </a>
            @endif
        @endcan
        @can('delete', $email)
            @if(count($serviceperson->emailAddresses) > 1 && $email->pivot->email_type_id != 1)
                <a class="ml-5" href="{{route('serviceperson_emails.destroy', $email->id)}}" data-remote="true">
                    <i style="" data-feather="trash"></i>
                </a>
            @endif
        @endcan
    </div>
@endforeach
{{-- END: Email Address--}}

{{-- BEGIN: Address--}}
@foreach($serviceperson->addresses->take(1) as $address)
    <div class="truncate sm:whitespace-normal flex items-center  mb-2">
        <i data-feather="map-pin" class="w-4 h-4 mr-2"></i>
        {{$address->full_address}}
        @can('update', $address)
            <a class="ml-5" href="{{route('serviceperson_addresses.edit', $address->id)}}" data-remote="true">
                <i class="" data-feather="edit"></i>
            </a>
        @endcan
    </div>
@endforeach
{{-- END: Address--}}
