<x-layout title="Pagina Annuncio">
    
    <div>
        <h1>{{ $announcement->title }}</h1>
    </div>

    <div class="container">
        <div class="row">
            <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/300" class="img-fluid p-3" alt="">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/300" class="img-fluid p-3" alt="">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/300" class="img-fluid p-3" alt="">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/300" class="img-fluid p-3" alt="">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                    data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                    data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card-body">
            <h5 class="card-title">{{$announcement->title}}</h5>
            <p class="card-text">{{$announcement->description}}</p>
            <p class="card-text">{{$announcement->price}}&euro;</p>
            <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn
             btn-success">{{$announcement->category->name}}</a>
             <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} <br>
             Autore: {{$announcement->user->name ?? ''}}</p>
    
        </div>
    </div>



    

    

    
</x-layout>