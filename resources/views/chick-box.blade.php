<div class="row">
    <div class="col-md-12">


        <form method="POST" action="{{ route('chicks.store') }}" id="chickBox">

            @csrf


            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="chickPost" placeholder="Poussin coup de gueule !">
                            </textarea>

                <input class="form-control form-control-sm" id="imagePost" name="image" type="text" placeholder="Upload image">

                <input class="form-control form-control-sm" id="tags" name="tags" type="text" placeholder="#WhateverYouWant">
            </div>


            <div class="row">

                <div class="col-md-6 text-left">
                    <img src="{{ auth()->user()->avatar }}" alt="" height="50" class="ml-5" id="chickPic">
                </div>

                <div class="col-md-6 text-right">
                    <input type="submit" value="Chicker !" class="btn btn-warning mr-5 mb-3">
                </div>
            </div>

            @error('chickPost')
            <div>
                <p class="text-danger ml-1">{{ $message }}</p>
            </div>
            @enderror

        </form>

    </div>
</div>