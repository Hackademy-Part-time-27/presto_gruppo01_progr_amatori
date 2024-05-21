<x-layout>
<div class="row">
    <div class="text-center">
        <h1>
            Lavora con noi
        </h1>
    </div>   
    <div class="col-md-2 mx-auto mt-5">
        <form action="{{route('become.revisor')}}" method="GET">
            @csrf
            <div class="row g-3">
                <div class="mb-3 col-12">
                    <label for="email" class="text-uppercase fw-bold">Email</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn text-uppercase fw-bold shadow" style=" width: 160px;
                background-color: #79B791; color: white; cursor: pointer;">Invia</button>
            </div>
            
        </form>
    </div>
</div>  
</x-layout>