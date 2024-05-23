<x-layout>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Annunci della categoria: {{$category->name}}</h1>
            <div class="row">
                @forelse ($acceptedAnnouncements as $announcement)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card shadow" style="width: 400px;">
                            <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->descrition}}</p>
                                <p class="card-text">{{$announcement->price}}€</p>
                                <a href="{{route('announcement.show', compact('announcement'))}}"
                                    class="btn mb-3" style="background-color: #79B791; color: white; cursor: pointer;">Dettagli</a>
                                <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h2>Non sono ancora presenti annunci per questa categoria!</h2>
                        <h3>Vuoi essere il primo?</h3>
                        <h3>Pubblicalo tu!</h3> 
                        <a href="{{route('announcements.create')}}"class="btn text-uppercase fw-bold shadow" style=" width: 160px;
                                background-color: #79B791; color: white; cursor: pointer;">Nuovo Annuncio</a>
                        
                    </div>
                    
                @endforelse

            </div>
        </div>
    </div>
</x-layout>    