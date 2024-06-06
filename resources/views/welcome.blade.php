<x-layout>
    <div class="container mt-1">
        <div class="d-flex flex-wrap justify-content-center mb-5">
            @foreach ($categories as $category)
                <button class="btn text-uppercase fw-bold shadow m-2" type="button" 
                        style="background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', compact('category')) }}">{{($category->name)}}</a>
                </button>
            @endforeach
        </div>        
    <div>   

    <x-success></x-success>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>{{__('ui.lastAnnouncements')}}</h2>
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-6 col-lg-4 my-4">
                            <div class="card shadow h-100">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 300) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->description}}</p>
                                    <p class="card-text">{{$announcement->price}}€</p>
                                    <a href="{{route('announcement.show', compact('announcement'))}}" 
                                            class="btn mb-3" style="background-color: #ffb300; color: black; cursor: pointer;">{{__('ui.details')}}</a>
                                    <a href="{{ route('categoryShow', compact('category')) }}" 
                                            class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer; 
                                            width: 160px">{{$announcement->category->name}}</a>
                                    @auth
                                        @if (Auth::user()->is_revisor)
                                            <form class="ms-1" action="{{ route('announcement.revise', $announcement) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn mb-3 " style="background-color: red; color: white; cursor: pointer;">
                                                    <span class="fa-solid fa-eye"></span>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    <p class="card-footer">{{__('ui.publication')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</x-layout>