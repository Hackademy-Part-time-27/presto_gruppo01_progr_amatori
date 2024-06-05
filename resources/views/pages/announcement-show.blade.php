<x-layout title="Pagina Annuncio">

    <div class="d-flex justify-content-center mt-1"></div>
        <div class="d-flex justify-content-evenly mb-5">
            @foreach ($categories as $category)
                <button class="btn text-uppercase fw-bold shadow" type="button" style=" width: 160px;
                        background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', compact('category')) }}">{{__('ui.' . $category->name)}}</a>
                </button>
            @endforeach
        </div>        
    </div> 
    
    <div class="col-12 text-center">
        <h1>{{ $announcement->title }}</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
            @if ($announcement->images)
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)
                            <div class="carousel-item @if($loop->first)active @endif" style="height: 300px;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{$image->getUrl(400, 300)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else                   
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1400/300" class="img-fluid p-3" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1400/300" class="img-fluid p-3" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1400/300" class="img-fluid p-3" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1400/300" class="img-fluid p-3" alt="">
                        </div>
                        
                    </div>
                @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="prev">
                            <span class="fa-solid fa-circle-arrow-left fa-lg" style="color: black;" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="next">
                            <span class="fa-solid fa-circle-arrow-right fa-lg" style="color: black;" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                    </button>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card-body">
            <h5 class="card-title mt-2 mb-2">{{$announcement->title}}</h5>
            <p class="card-text">{{$announcement->description}}</p>
            <p class="card-text">{{$announcement->price}}&euro;</p>
            <p class="card-text">{{__('ui.' . $announcement->category->name)}}</p>
             <p class="card-footer"> {{__('ui.publication') }} {{$announcement->created_at->format('d/m/Y')}} </p>
    
        </div>
    </div>



    

    

    
</x-layout>