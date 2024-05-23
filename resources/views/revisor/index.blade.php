<x-layout>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>
                {{ $announcement_to_check ? 'Annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
            </h1>
        </div>
    </div>
</div>
<x-success></x-success>
@if($announcement_to_check)
    <div class="container mt-4  ">
        <div class="row">
            <div id="showCarousel" class="carousel" data-bs-ride="carousel">
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
        <div class="card-body ms-3">
            <h5 class="card-title mt-2 mb-2">{{$announcement_to_check->title}}</h5>
            <p class="card-text">{{$announcement_to_check->description}}</p>
            <p class="card-text">{{$announcement_to_check->price}}&euro;</p>
            <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}} <br>
            Autore: {{$announcement_to_check->user->name ?? ''}}</p>

        </div>
    </div>
    <div class="row ">
        <div class="col-12 col-md-6 text-end">
            <form action="{{ route('revisor.accept_announcement',['announcement'=>$announcement_to_check]) }}" 
                method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success shadow">Accetta</button>
            </form>
        </div>
        <div class="col-12 col-md-6 ">
            <form action="{{ route('revisor.reject_announcement',['announcement'=>$announcement_to_check]) }}" 
                method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
            </form>
        </div>
    </div>
@endif


</x-layout>