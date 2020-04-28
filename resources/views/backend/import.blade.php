@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Importation Fichier Excel</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Importer Fichier Excel</h5>
                                            </div>
                                            <div class="card-body">
                                                    <div class="form-group ml-3">
                                                    <a href="{{ route('exportC')}}"><button class="btn btn-danger">Télécharger Excel (xlsx)</button></a>
                                                    </div>
                                            <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title mb-0">Importer un fichier</h5>
                                                        </div>
                                                        <div class="card-body">
                                                        <form action="{{route('importC')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @if ($errors->any())
                                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                                    <div class="alert-icon">
                                                                        <i class="far fa-fw fa-bell"></i>
                                                                    </div>
                                                                    <div class="alert-message">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                                {{-- <div class="form-group" style="width: 50%">
                                                                    <label for="tabe">Tables :</label>
                                                                    <select name="tabe" id="tabe" class="form-control">
                                                                        <option value=""> --- Choisir un table --- </option>
                                                                        <option value="categories">Categories</option>
                                                                        <option value="produits">Produits</option>
                                                                    </select>
                                                                 </div> --}}
                                                                <div class="form-group">
                                                                    <input type="file" name="import_file" />
                                                                    <small class="form-text  text-danger">type des fichier(xlsx)</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary text-center">Importer</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>

                                                <table id="datatables-buttons" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Icon</th>
                                                            <th>Nom de catégorie</th>
                                                            <th>Description</th>
                                                            <th>Illustration</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($categories as $cat)
                                                        <tr>
                                                            <td>{{ $cat->id }}</td>
                                                            <td>
<img src="{{asset('storage/'.$cat->icon)}}" class="img-thumbnail rounded" style="width: 80px;height: 50px;">
                                                            </td>
                                                            <td>{{ $cat->nom_categorie }}</td>
                                                            <td>{{ $cat->description }}</td>
                                                            <td>{{ $cat->illustration }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
