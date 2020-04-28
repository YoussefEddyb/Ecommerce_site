@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Liste Des Commandes</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Commandes</h5>
                                            </div>
                                            <div class="card-body">
<!-- BEGIN  modal -->
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#sizedModalLg">
<i class="align-middle mr-2 fas fa-fw fa-plus-square"></i><span class="align-middle">Ajouter</span>
</button>
                <div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un Commande</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body m-3">
                            <form action="{{Route("commande.store")}}" method="post" id="frm">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                        <label for="client">Client</label>
                                                        <select name="client_id" id="client" class="form-control" onchange="changeClient(this.options[this.selectedIndex].value);">
                                                            <option value=""> --- Choisir Client --- </option>
                                                            @foreach($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->nom_client." ".$client->prenom_client }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Adresse</label>
                                                    <input type="text" name="adresse" class="form-control" id="adresse">
                                                </div>
                                                    <div class="form-group">
                                                    <label for="messager">Messager</label>
                                                    <select name="messager_id" id="messager" class="form-control">
                                                        <option value=""> --- Choisir messager --- </option>
                                                        @foreach($messagers as $messager)
                                                        <option value="{{ $messager->id }}">{{ $messager->nom_message}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Date livrer</label>
                                                        <input class="form-control" type="date" value="{{ date("Y-m-d") }}" name="dateliv" />
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label">Date d'envoi</label>
                                                    <input class="form-control" value="{{ date("Y-m-d") }}" type="date" name="date_envoi" />
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label">Port</label>
                                                    <input type="number" name="port" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="form-label">Destinataire</label>
                                                    <input type="text" name="destinataire" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="form-group required">
                                                        <label class="form-label">Pays</label>
                                                         <select name="country_id" id="input-country" class="form-control">
                                                                <option value=""> --- Choisir un pays --- </option>
                                                                <option value="Maroc">Maroc</option>
                                                                <option value="France">France</option>
                                                                <option value="Algérie">Algérie</option>
                                                                <option value="Canada">Canada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="form-label">Région</label>
                                                         <select name="reg_id" id="input-zone" class="form-control">
                                                                <option value=""> --- Choisir une région --- </option>
                                                                <option value="Fès-Meknés">Fès-Meknés</option>
                                                                <option value="Casablanca-settat">Casablanca-settat</option>
                                                                <option value="Rabat-salé">Rabat-salé</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="form-label">Ville</label>
                                                        <select name="city" id="input-city" class="form-control">
                                                                <option value=""> --- Choisir une Ville --- </option>
                                                                <option value="Fès">Fès</option>
                                                                <option value="Casablanca">Casablanca</option>
                                                                <option value="Rabat">Rabat</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Code postal</label>
                                                        <input type="text" name="codepost" class="form-control" data-mask="00000">
                                                        <span class="font-13 text-danger">Exemple "xxxxx"</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                <button form="frm" type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- END  modal -->
                                                <table id="datatables-buttons" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Date Commande</th>
                                                            <th>Client</th>
                                                            <th>Detail</th>
                                                            <th>Modifier</th>
                                                            <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $cnt=1; @endphp
                                                    @foreach($commandes as $cmd)
                                                        <tr>
                                                            <td>{{ $cmd->id }}</td>
                                                            <td>{{ $cmd->date_commande }}</td>
                                                            <td>{{ $cmd->client->nom_client." ".$cmd->client->prenom_client }}</td>
                                                            <td>
                                                            <form action="{{route('commande.detailcommande', ['idcom'=>$cmd->id])}}" method="post">
                                                                @csrf
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fas fa-eye"></i> Détail commandes
                                                            </button>
                                                            </form>
                                                            </td>
                                                            <td>
                                                            <a href="#"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Modifier
                                                            </a>
                                                            </td>
                                                            <td>
                                                            <form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('commande.destroy', ['id' => $cmd->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm" onclick="del({{$cnt}});" id="sup{{$cnt}}">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                                </button>
                                                            </form>
                                                            </td>
                                                        </tr>
                                                    @php $cnt++; @endphp
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

@section('javascript')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript">
function changeClient(id_client)
{
    $("#adresse").clear;
    axios.post('change_client/',{id_client})
    .then(response=>($('#adresse')
    .val(response.data[0].contact)))
}

function del(id)
{
    Swal.fire({
        title: 'Êtes-vous sûr de vouloir bloquer cette élément ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Annuler',
        confirmButtonText: 'Oui'
        }).then((result) => {
        if (result.value) {
        document.getElementById('fr'+id).submit();
        }
        })
}
</script>

@stop
