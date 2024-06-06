
<x-layout>
    <div class="container mt-1">
        <div class="d-flex flex-wrap justify-content-center mb-5">
            @foreach ($categories as $category)
                <button class="btn text-uppercase fw-bold shadow m-2" type="button" 
                        style="background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', compact('category')) }}">{{__('ui.' . $category->name)}}</a>
                </button>
            @endforeach
        </div>        
    </div>   

    <x-success></x-success>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>{{__('ui.welcome')}}</h1>
                <h2>{{__('ui.allAnnouncements')}}</h2>
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-6 col-lg-4 my-4">
                            <div class="card shadow h-100">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 300) 
                                : 'https://picsum.photos/200'}}"  class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->description}}</p>
                                    <p class="card-text">{{$announcement->price}}€</p>
                                    <a href="{{route('announcement.show', compact('announcement'))}}" 
                                            class="btn mb-3 me-2" style="background-color: #ffb300; color: black; cursor: pointer;">{{__('ui.details')}}</a>
                                    <a href="{{ route('categoryShow', compact('category')) }}" 
                                            class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer; 
                                            width: 160px">{{__('ui.' . $announcement->category->name)}}</a>
                                     <p class="card-footer">{{__('ui.publication')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">
                                <p class="lead">Nessun risultato trovato, riprova!</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

    </div>
</x-layout>