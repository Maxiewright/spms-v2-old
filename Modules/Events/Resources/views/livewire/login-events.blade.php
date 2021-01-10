<div>
    <div class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            @if ($events->count() < 0)
                @foreach($events as $event)
                    <div class="carousel-item {{($loop->index == 0) ? 'active' : ''}}">
                        <img src="{{$event->image ?? ''}}" class="img-fluid" alt="{{$event->name}}" height="150" width="150" />
                        <div class="px-4 mt-4">
                            <h2>{{$event->name ?? ''}}</h2>
                            <h4>{{$event->description ?? ''}}</h4>
                            <h5>{{$event->start_at->toDayDateTimeString() ?? ''}}</h5>
                            <h5>{{$event->end_at->toDayDateTimeString() ?? ''}}</h5>
                        </div>
                    </div>
                @endforeach
            @elseif(request()->is('password/change'))

                @include('livewire.event.partials.password_guidelines')

            @else
                <div class="carousel-item active">
                    <img src="../assets/logo/ttr-logo.png" class="img-fluid" alt="login page"/>
                    <div class="px-4 mt-4">
                        <h4>Serviceperson Management System</h4>
                        <p>Caring for the nation's caretakers</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
