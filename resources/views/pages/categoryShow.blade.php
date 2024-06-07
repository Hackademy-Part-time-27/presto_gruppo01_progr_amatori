<x-layout>
   
    <div class="container mt-1">
        <div class="d-flex flex-wrap justify-content-center mb-5">
            @foreach ($categories as $categoria)
                <button class="btn text-uppercase fw-bold shadow m-2" type="button" 
                        style="background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', ['category'=>$categoria]) }}">{{__('ui.' . $categoria->name)}}</a>
                </button>
            @endforeach
        </div>        
    </div>   
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>{{__('ui.categoryAnnouncements')}} {{__('ui.' . $category->name)}}</h1>
                <div class="row">
                    @forelse ($acceptedAnnouncements as $announcement)
                            <div class="col-12 col-md-6 col-lg-4 my-4">
                                <div class="card shadow h-100">
                                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 300) 
                                    : 'https://picsum.photos/200'}}"  class="card-img-top p-3 rounded bg-white" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$announcement->title}}</h5>
                                        <p class="card-text">{{$announcement->description}}</p>
                                        <p class="card-text">{{$announcement->price}}€</p>
                                        <a href="{{route('announcement.show', compact('announcement'))}}" 
                                                class="btn mb-3 me-2" style="background-color: #ffb300; color: black; cursor: pointer;">{{__('ui.details')}}</a>
                                        <a href="{{ route('categoryShow', compact('category')) }}" 
                                                class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer; 
                                                width: 160px">{{__('ui.' . $announcement->category->name)}}</a>
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
                        @empty
                        <div class="col-12 mt-5">
                            <h2>{{__('ui.noCategoryAnnouncements')}}</h2>
                            <h3>{{__('ui.beTheFirst')}}</h3>
                            <h3>{{__('ui.publish')}}</h3> 
                            <a href="{{route('announcements.create')}}"class="btn text-uppercase fw-bold shadow mt-5" style=" width: 160px;
                                    background-color: #79B791; color: white; cursor: pointer;">{{__('ui.newAnnouncement')}}</a>
                            
                        </div>
                        
                    @endforelse

                </div>
            </div>
        </div>    
    </div>
</x-layout>    