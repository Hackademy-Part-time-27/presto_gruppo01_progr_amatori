<x-layout title="Registrati" >
<div class="row">

        <div class="text-center">
            <h1>
                Registra un nuovo Account
            </h1>
        </div>

        <div class="col-md-2 mx-auto">
            

            <div class="mt-5">
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 mb-3">
                            <label for="name" class="text-uppercase fw-bold">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="text-uppercase fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password" class="text-uppercase fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password_confirmation" class="text-uppercase fw-bold">Conferma Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn text-uppercase fw-bold shadow" style=" width: 160px;
                            background-color: #79B791; color: white; cursor: pointer;">Registrati</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>