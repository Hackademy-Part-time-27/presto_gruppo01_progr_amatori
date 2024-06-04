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
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div id="gallery" class="rounded">
                    @if ($announcement_to_check->images)
                            @foreach ($announcement_to_check->images as $image)
                                <div class="card mb-4" style="background-color: rgb(247, 247, 247)">
                                    <div class="row p-2">
                                        <div class="col-12 col-md-6 border-end">
                                            <img src="{{$image->getUrl(400, 300)}}" alt="" class="img-fluid p-3 rounded">
                                        </div>
                                        <div class="col-md-3 border-end">
                                            <h5 class="tc-accent mt-3">Tags</h5>
                                            <div class="p-2">
                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        <p class="d-inline">{{$label}}, </p>
                                                    @endforeach
                                                @endif        
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <h5 class="tc-accent">Revisione Immagini</h5>
                                                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                                <p>Insinuante: <span class="{{$image->racy}}"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                            @endforeach
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
            <p class="card-text border-bottom">{{$announcement_to_check->price}}&euro;</p>
            <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}} </p>

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