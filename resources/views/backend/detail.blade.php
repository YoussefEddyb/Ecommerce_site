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
            <form method="POST"  action="{{route("detail.store")}}" id="frm_d">
                @csrf
                                <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead>
                                          <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"> Produit </th>
                                            <th class="text-center"> Prix </th>
                                            <th class="text-center"> Quantité</th>
                                            <th class="text-center"> remise </th>
                                            <th class="text-center"> Montant </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr id='addr0'>
                                              <input type="hidden" name="id" value="{{$commande->id}}">
                                            <td>{{$commande->id}}</td>
                                            <td style="width: 30%;">
                                                <select class="form-control" name='product[]' onchange="changeproduit(this.options[this.selectedIndex].value);">
                                                    <option value=""> --- Choisir Produit --- </option>
                                                    @foreach($produits as $prod)
                                                      <option value="{{ $prod->id }}">{{ $prod->nom_produit }}</option>
                                                    @endforeach
                                                  </select>
                                                </select>
                                            </td>
                                            <td><input type="number" name='price[]' value="1000" class="form-control price"/></td>
                                            <td><input type="number" name='qty[]' class="form-control qty"/></td>
                                            <td><input type="number" name='remise[]' value="0" class="form-control remise"/></td>
                                            <td><input type="number" name='montant[]' class="form-control montant" readonly/></td>
                                          </tr>
                                          <tr id='addr1'></tr>
                                        </tbody>
                                </table>
            </form>
                                <div class="col-md-12 m-2">
                                    <button id="add_row" class="btn btn-primary">Ajouter une ligne</button>
                                    <button id='delete_row' class="btn btn-danger float-right">supprimer une ligne</button>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered tb1" id="tab_logic_total">
                                    <tr>
                                      <th>Total HT :</th>
                                      <td><input type="number" name='sub_total' class="form-control" id="sub_total" readonly/></td>
                                    </tr>
                                    <tr>
                                      <th>Tax TVA :</th>
                                      <td><input type="number" name='tax_amount' id="tax_amount" class="form-control" readonly/></td>
                                    </tr>
                                    <tr>
                                      <th>Total TTC</th>
                                      <td><input type="number" name='total_amount' id="total_amount" class="form-control" readonly/></td>
                                    </tr>
                                    <tr><td colspan="2"><button form="frm_d" type="submit" class="btn btn-success btn-lg float-right">Valider</button></td></tr>
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
<script src="{{asset('js/jquery.min.js')}}" ></script>
<script src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript">
  var id = "<?php if(isset($commande)){echo $commande->id;} ?>"
$(document).ready(function(){

  var x = id;
    var i=1;
    $("#add_row").click(function(){
        b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(x);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
       i++;
    });
    $("#delete_row").click(function(){
      if(i>1){
    $("#addr"+(i-1)).html('');
    i--;
    }
    calc();
  });

  $('#tab_logic tbody').on('keyup change',function(){
    calc();
  });
  $('#tax').on('keyup change',function(){
    calc_total();
  });


});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
			var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var remise=$(this).find('.remise').val();
			$(this).find('.montant').val((qty*price)-((qty*price)*remise/100));
			calc_total();
    });
}

function calc_total()
{
	total=0;
	$('.montant').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
    $('#total_amount').val((total*1.2).toFixed(2));
	$('#tax_amount').val(((total*1.2)-total).toFixed(2));

}

function changeproduit(id_prod)
{
    $(".price").clear;
    axios.post('/change_produit/',{id_prod})
    .then(response=>($('.price')
    .val(response.data[0].prix_unitaire)))
}
</script>
@stop
