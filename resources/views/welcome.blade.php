<x-layout>
    <div class="d-flex justify-content-center">...</div>
        <div class="d-flex justify-content-evenly">
            @foreach ($categories as $category)
                <button type="button" style="border-radius: 12px; padding: 10px 20px; border: none;
                        background-color: #79B791; color: white; cursor: pointer;">
                <a class="text-decoration-none text-light" href="{{ route('categoryShow', compact('category')) }}">{{($category->name)}}</a>
                </button>
            @endforeach
        </div>        
<div>   

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Presto</h1>
                <p>Ultimi annunci inseriti</p>
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 400px;">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->descrition}}</p>
                                    <p class="card-text">{{$announcement->price}}€</p>
                                    <a href="" class="btn btn-primary shadow">Visualizza</a>
                                    <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn
                                     btn-success">{{$announcement->category->name}}</a>
                                     <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</x-layout>