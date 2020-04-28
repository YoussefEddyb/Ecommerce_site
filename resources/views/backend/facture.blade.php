<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <style>
            .clearfix:after {
            content: "";
            display: table;
            clear: both;
            }

            a {
            color: #0087C3;
            text-decoration: none;
            }

            body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
            }

            header {
            width: 90%;
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
            }

            #logo {
            background-color: #232f3e;
            float: left;
            margin-top: 8px;
            }

            #logo img {
            height: 70px;
            }

            #company {
            float: left;
            text-align: center;
            }


            #details {
            width: 90%;
            margin-bottom: 50px;
            }

            #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
            }

            #client .to {
            color: #777777;
            }

            h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
            }

            #invoice {
            float: left;
            text-align: center;
            }

            #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
            }

            #invoice .date {
            font-size: 1.1em;
            color: #777777;
            }

            table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #EEEEEE;
            margin-bottom: 20px;
            }

            table th,
            table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
            }

            table th {
            white-space: nowrap;
            font-weight: normal;
            }

            table td {
            text-align: right;
            }

            table td h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
            }
            table tbody tr:last-child td {
            border: none;
            }

            table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
            }

            table tfoot tr:first-child td {
            border-top: none;
            }

            table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

            }

            table tfoot tr td:first-child {
            border: none;
            }

            #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            }

            footer {
            color: #777777;
            width: 90%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
            }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{public_path('frontend/image/demo/logos/ecom.png')}}" alt="Logo" height="100px">
      </div>
      <div id="company">
        <h2 class="name">Market Youed</h2>
        <div>255 Lqods barnoussi ,Casablanca</div>
        <div>(+212) 0682643640</div>
        <div><a href="#">contact@youed.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">FACTURE À:</div>
        <h2 class="name">{{$com->destinataire}}</h2>
          <div class="address">{{$com->adresse_livraison}}</div>
          <div class="email"><a href="mailto:{{$com->client->email}}">{{$com->client->email}}</a></div>
        </div>
        <div id="invoice">
          <h1>FACTURE {{$com->id}}</h1>
          <div class="date">Date de facture: {{$com->date_commande}}</div>
          <div class="date">Date d'échéance: 01/03/2020</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quntite</th>
            <th>Remise</th>
            <th>Montant</th>
          </tr>
        </thead>
        <tbody>
            @php $s=0; @endphp
            @foreach($detail as $prod)
            <tr>
            <td>{{$prod->produit->nom_produit}}</td>
            <td>{{$prod->prix_unitaire}}</td>
            <td>{{$prod->quantite}}</td>
            <td>{{$prod->remise}}%</td>
            <td>{{($prod->prix_unitaire*$prod->quantite)-((($prod->prix_unitaire*$prod->quantite)*$prod->remise)/100)}}</td>
            </tr>
            @php $s+=($prod->prix_unitaire*$prod->quantite)-((($prod->prix_unitaire*$prod->quantite)*$prod->remise)/100); @endphp
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Total (HT)</td>
          <td>{{$s}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TVA (20%)</td>
          <td>{{$s*0.2}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Total TTC</td>
          <td>{{ $s*1.2}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="notices">
        <div>Cachet avec signature :</div>
        <div class="notice">

        </div>
      </div>
    </main>
    <footer>
        La facture a été créée sur un ordinateur et n'est pas valide sans la signature et le cachet.
    </footer>
  </body>
</html>
