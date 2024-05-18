    <div class="rounded shadow-sm p-3">
       
        
    
        <x-success />
    
        <form wire:submit="store">

            <div class="mb-3">
                <label for="title" class="text-uppercase fw-bold">Titolo Annuncio</label>
                <input type="text" id="title" class="form-control" wire:model.live="title">
                @error('title') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="text-uppercase fw-bold">Descrizione</label>
                <textarea type="text" id="description" class="form-control" wire:model.live="description"></textarea>
                @error('description') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="text-uppercase fw-bold">Prezzo</label>
                <input type="number" id="price" class="form-control" wire:model.live="price">
                @error('price') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>

            <div class="mb-5">
                <label for="category" class="text-uppercase fw-bold">Categoria</label>
                <select id="category" wire:model.defer="category" class="form-control">
                    <option value="">Scegli Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn text-uppercase fw-bold shadow" style=" width: 160px;
            background-color: #79B791; color: white; cursor: pointer;">Crea</button>
            </div>    
        </form>
    </div>
    
