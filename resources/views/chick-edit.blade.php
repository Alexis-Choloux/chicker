@if (auth()->user()->id == $chick->user_id)

<div>
    <button type="button" class="btn btn-sm btn-outline-secondary ml-3" data-toggle="modal" data-target="#chickModal{{ $chick->id }}"><i class="far fa-edit"></i></button>
</div>

<div>
<button type="button" class="btn btn-sm btn-outline-danger ml-2" data-toggle="modal" data-target="#deleteModal{{ $chick->id }}"><i class="far fa-trash-alt"></i></button>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="chickModal{{ $chick->id }}" tabindex="-1" role="dialog" aria-labelledby="chickModal{{ $chick->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="chickModal{{ $chick->id }}Label">Modification du chick</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">

                <form method="POST" action="{{ route('chicks.update', $chick) }}">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ $chick->content }}
                </textarea>

                        <input class="form-control form-control-sm" id="imagePost" name="image" type="text" placeholder="Upload image">

                        <input class="form-control form-control-sm" id="tags" name="tags" type="text" value="{{ $chick->tags }}">
                    </div>


                    <div class="row">

                        <div class="col-md-6 text-left mb-2">
                            <img src="{{ auth()->user()->avatar }}" alt="" height="50" class="ml-5" id="chickPic">
                        </div>

                    </div>


                    <div class="modal-footer">
                        <input type="submit" value="Enregistrer les modifications !" class="btn btn-warning mr-5 mb-3">
                    </div>

                    @error('chickPost')
                    <div>
                        <p class="text-danger ml-1">{{ $message }}</p>
                    </div>
                    @enderror

                </form>

            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $chick->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $chick->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="deleteModal{{ $chick->id }}Label">Suppression du chick</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">

                <form method="POST" action="{{ route('chicks.destroy', $chick) }}">

                    @csrf
                    @method('delete')

                    <p>Vous êtes sur le point de supprimer votre Chick.<br>
                    Etes-vous vraiment sûr ?</p>

                    <div class="modal-footer">
                        <input type="submit" value="Confirmer suppression !" class="btn btn-outline-danger mr-5 mb-3">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endif