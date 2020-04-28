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

                                 </div>
                                <table class="table table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th class="text-center"> Produit </th>
                                            <th class="text-center"> Prix </th>
                                            <th class="text-center"> Quantité</th>
                                            <th class="text-center"> remise </th>
                                            <th class="text-center"> Montant </th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $s=0;
                                            @endphp
                                            @foreach($details as $d)
                                            <tr>
                                            <td>{{$d->produit->nom_produit}}</td>
                                            <td>{{$d->prix_unitaire}}</td>
                                            <td>{{$d->quantite}}</td>
                                            <td>{{$d->remise}}%</td>
                                            <td>{{($d->prix_unitaire*$d->quantite)-((($d->prix_unitaire*$d->quantite)*$d->remise)/100)}}</td>
                                            <td>
                                                <button class="btn btn-danger btn-lg" v-on:click="deleteDetail({{$d->id}})">
                                                <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            </tr>
                                            @php
                                                $s+=($d->prix_unitaire*$d->quantite)-((($d->prix_unitaire*$d->quantite)*$d->remise)/100);
                                            @endphp
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <table class="table table-hover table-bordered tb1">
                                    <tr>
                                      <th>Total HT :</th>
                                    <td>{{$s}}</td>
                                    </tr>
                                    <tr>
                                      <th>Tax TVA :</th>
                                      <td>{{$s*0.2}}</td>
                                    </tr>
                                    <tr>
                                      <th>Total TTC</th>
                                      <td>{{$s*1.2}}</td>
                                    </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@stop


@section('javascript')
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script src="{{asset('js/vue.js')}}" ></script>
    <script src="{{asset('js/axios.js')}}" ></script>


<script type="text/javascript">
const app = new Vue({
    el: "#vue-crud",
    methods: {
            deleteDetail:function(id)
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
                    axios.post('/deleteD/'+id)
                    .then(res => {
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
            this.deleteDetail(id);
        }
});
</script>
@stop
