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
                <div class="mb-3 mt-4 ">
                    <label for="image" class="text-uppercase fw-bold">Immagini</label>
                    <input wire:model="temporary_images" type="file" name="images" multiple class="form-control
                    @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{$error}}</p>
                    @enderror
                </div>
                @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Anteprima immagine</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" 
                                        style="background-image: url({{$image->temporaryUrl}})"></div>
                                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" 
                                        wire:click="remove({{$key}})">Cancella</button>
                                    </div>
                                @endforeach    
                            </div>
                        </div>
                    </div> 
                @endif          
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn text-uppercase fw-bold shadow" style=" width: 160px;
            background-color: #79B791; color: white; cursor: pointer;">Crea</button>
            </div>    
        </form>
    </div>
    
