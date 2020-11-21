<div>
    <form method="POST" action="{{route($action)}}">
        @csrf
        {{$slot}}

        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
            <button
                id="login"
                class="button button--lg w-full xl:w-auto text-white bg-theme-1 xl:mr-3 align-top">
                {{ __($submitBtn) }}
            </button>
        </div>
    </form>
</div>
