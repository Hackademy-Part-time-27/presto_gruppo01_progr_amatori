    <div class="rounded shadow-sm p-3">
       
        <h4>Nuovo Annuncio</h4>
        
    
        <x-success />
    
        <form wire:submit="store">

            <div>
                <label for="title">Titolo Annuncio</label>
                <input type="text" id="title" class="form-control" wire:model="title">
                @error('title') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>

            <div>
                <label for="description">Descrizione</label>
                <textarea type="text" id="description" class="form-control" wire:model="description"></textarea>
                @error('description') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>

            <div>
                <label for="price">Prezzo</label>
                <input type="number" id="price" class="form-control" wire:model="price">
                @error('price') <span class="small text-danger">{{ $message }} </span> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
    
