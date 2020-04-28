@extends('layouts.back')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Paramétres</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Paramétres</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <form action="{{ route('admin.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$config->id}}">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$config->email}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{$config->adresse}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="tel">Téléphone</label>
                                                    <input type="text" class="form-control" id="tel" name="tel" value="{{$config->telephone}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="faxe">Faxe</label>
                                                    <input type="text" class="form-control" id="faxe" name="faxe" value="{{$config->fax}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Déscription</label>
                                                <textarea class="form-control" rows="5" id="desc" name="desc">
                                                    {{$config->description}}
                                                </textarea>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" id="logo" name="logo"  onchange="readURL(this);">
                                                    <small class="form-text  text-danger">type des logos(png,jpg)</small>
                                                    <img id="blah" src="{{asset('storage/'.$config->logo)}}" class="img-responsive mt-2" width="128" height="128" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="image">Image</label>
                                                    <input type="file" id="image" name="image"  onchange="readURL1(this);">
                                                    <small class="form-text  text-danger">type des images(png,jpg)</small>
                                                    <img id="img1" src="{{asset('storage/'.$config->banner_pub)}}" class="img-responsive mt-2" width="128" height="128" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregister</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
            </div>
    </div>
</main>
@stop

@section('javascript')
<script src="{{asset('js/jquery.min.js')}}" ></script>
<script type="text/javascript">

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img1')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@stop
