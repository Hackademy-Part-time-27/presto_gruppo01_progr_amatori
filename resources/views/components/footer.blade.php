

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
                <a href="{{route('announcements.index')}}" class="nav-link px-2 text-muted">{{__('ui.home')}}</a>
            </li>
            @if (Auth::user())
                @if (Auth::user()->is_revisor)
                <li></li>
                @endif   
            @else
                <li class="nav-item">
                    <a href="{{route('form.revisor')}}" class="nav-link px-2 text-muted">{{__('ui.career')}}</a>
                </li>
            @endif
            <li class="nav-item">
                <a href="" class="nav-link px-2 text-muted">Privacy</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link px-2 text-muted">{{__('ui.info')}}</a>
            </li>
        </ul>
        <p class="text-center text-muted">&copy;2024 Presto.it</p>
        <p class="text-center text-muted">All rights reserved</p>
    </footer>
</div>