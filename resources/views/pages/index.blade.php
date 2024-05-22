
<x-layout>
    <div class="d-flex justify-content-center mt-5"></div>
        <div class="d-flex justify-content-evenly mb-5">
            @foreach ($categories as $category)
                <button class="btn text-uppercase fw-bold shadow" type="button" style=" width: 160px;
                        background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', compact('category')) }}">{{($category->name)}}</a>
                </button>
            @endforeach
        </div>        
    <div>   

    <x-success></x-success>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Annunci</h2>
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 400px;">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->description}}</p>
                                    <p class="card-text">{{$announcement->price}}€</p>
                                    <a href="{{route('announcement.show', compact('announcement'))}}" 
                                            class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer;">Dettagli</a>
                                    <a href="{{ route('categoryShow', compact('category')) }}" 
                                            class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer; 
                                            width: 160px">{{$announcement->category->name}}</a>
                                     <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
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