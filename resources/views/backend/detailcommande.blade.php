@extends('layouts.back')

@section('content')
<main class="content" id="vue-crud">
<div class="container-fluid p-0">

<h1 class="h3 mb-3">Détail Commande</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Détail Commande</h5>
                                </div>
                                <div class="card-body">
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputid">Num Commande</label>
        <input type="text" value="{{$commande->id}}" class="form-control" id="inputid" readonly>
    </div>
    <div class="form-group col-md-4">
        <label for="inputdate">Date Commande</label>
        <input type="text" value="{{$commande->date_commande}}" class="form-control" id="inputdate" readonly>
    </div>
    <div class="form-group col-md-4">
        <label for="inputclient">Client</label>
    <input type="text" value="{{ !empty($commande->client) ? $commande->client->nom_client." ".$commande->client->prenom_client:'' }}" class="form-control" id="inputclient" readonly>
    </div>
</div>
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sizedModalLg">
    <i class="fas fa-fw fa-plus-circle"></i>
</button>
        <table  class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Déscription</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Remise</th>
                    <th>Montant</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>
                            <div class="input-group btn-block">
                                    <input type="hidden" name="id_prod" class="form-control" :value="item.id_produit" />
                                    <input type="number" class="form-control" :value="item.id_produit"  readonly />
                            </div>                   
                    </td>
                    <td>
                            <div class="input-group btn-block">
                                    <input type="number" name="prixu" class="form-control" :value="item.prix_unitaire" />
                            </div>
                    </td>
                    <td class="text-left" width="200px">
                            <div class="input-group btn-block">
                                    <input type="text" :value="item.quantite" name="quantity"  size="1" class="form-control" :value="item.quantite" />
                                    {{-- <span class="input-group-btn">
                                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary">
                                            <i class="fa fa-clone"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick="">
                                            <i class="fa fa-times-circle"></i>
                                        </button>
                                    </span> --}}
                            </div>
                    </td>
                    <td>
                            <div class="input-group btn-block">
                                    <input type="number" name="remise" class="form-control" :value="item.remise" />
                            </div>
                    </td>
                    <td>
                        <div class="input-group btn-block">
                            <input type="number" class="form-control" :value="(item.prix_unitaire * item.quantite) - item.remise" readonly />
                        </div>
                    </td>
                    <td>
                        <a href="#" 
                        class="btn btn-warning btn-lg">
                        <i class="fas fa-edit"></i>
                        </a>     
                    </td>
                    <td>
                        <button class="btn btn-danger btn-lg" v-on:click="deleteDetail(item)">
                        <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-striped table-bordered tb1">
            <tbody>
                <tr>
                    <td>
                        <strong>Total HT:</strong>
                    </td>
                    <td class="text-right">3000 DH</td>
                </tr>
                <tr>
                    <td>
                        <strong>TVA:</strong>
                    </td>
                    <td class="text-right">300 DH</td>
                </tr>
                <tr>
                    <td>
                        <strong>Total TTC:</strong>
                    </td>
                    <td class="text-right">3300 DH</td>
                </tr>
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

<!-- BEGIN  modal -->
<div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter détail d'un commande</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body m-3">
                <form onsubmit="return false;" id="frm">
                    <input type="hidden" id="idcom" value="{{$commande->id}}" name="idcom" required>
                    <div class="form-group">
                            <label class="form-label" for="product">Produits</label>
                            {{--  onchange="changeProduit(this.options[this.selectedIndex].value);" --}}
                            <select v-model="newItem.produit_id" name="produit_id" id="product" class="form-control">
                                <option value=""> --- Choisir un produit --- </option>
                                @foreach($produits as $produit)
                                <option value="{{ $produit->id }}" class="text-danger">{{ $produit->nom_produit }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                            <label class="form-label">Prix unitaire</label>
                            <input type="number" class="form-control" name="prixu" id="prixu" v-model="newItem.prixu" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Quantité</label>
                        <input type="number" class="form-control" name="qte" id="qte" v-model="newItem.qte" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Remise</label>
                        <input type="number" class="form-control" name="remise" id="remise" v-model="newItem.remise" required>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    <button form="frm" type="submit" class="btn btn-success" v-on:click="ajoutDetailCmd">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END  modal -->

</main>
@stop

@section('javascript')
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script src="{{asset('js/vue.js')}}" ></script>
    <script src="{{asset('js/axios.js')}}" ></script>
<script type="text/javascript">
function changeProduit(id_produit)
{
    $("#prixu").clear;
    axios.post('change_produit/',{id_produit})
    .then(response=>($('#prixu')
    .val(response.data[0].prix_unitaire)))
}
var idcom= document.getElementById('idcom').value;
const app = new Vue({
    el: "#vue-crud",
    data: { 
        items: [],
        newItem: { 'idcom':idcom,'produit_id': '','prixu': '','qte':'','remise':'' }
        },
    methods: {
        readlists:function()
            {
                axios.get('http://localhost:8000/details')
                    .then(response => {
                        this.items = response.data;
                        //console.log(response.data);
                    })
                    .catch((err) => console
                    .error(err));
            },
            ajoutDetailCmd: function()
                {
                    var self = this;
                    var input = this.newItem;
                axios.post('/addDetail',input)
                    .then((res) => {
                        this.items = res.data;
                        toastr.success('Ce détail de commande a été ajouté avec succès!');
                        $('#sizedModalLg').modal('toggle');
                    })
                    .catch((err) => console
                        .error(err));
                },
            deleteDetail:function(item)
                {
                    Swal.fire({
                    title: 'Êtes-vous sûr de vouloir supprimer cette élément ?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Annuler',
                    confirmButtonText: 'Oui'
                    }).then((result) => {
                    if (result.value) {

                    axios.post('/deleteD/' + item.id)
                    .then(res => {
                    this.readlists();
                    toastr.error('Ce détail de commande a été supprimé avec succès!');
                    })
                    .catch(error =>{
                        toastr.error('error');
                        console.error(err)});
                    }
                    })
                }
            },
    mounted : function()
        {
            this.readlists();
        }
});
</script>
@stop