@extends('layouts.site')


@section('content')
<div class="main-container container"  style="background: white;padding: 20px;box-shadow: 5px 5px 5px 5px wheat;height:560px;margin-bottom: 40px;">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Shopping Cart</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
    <div id="content" class="col-sm-12">
      <h2 class="title">Panier</h2>
        <div class="table-responsive form-group">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Produit</td>
                <td class="text-left">Quantité</td>
                <td class="text-right">Prix unitaire</td>
                <td class="text-right">Montant</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">
                    <img width="70px" src="{{ asset('frontend/image/demo/E3.jpg') }}" class="img-thumbnail" />
                </td>
                <td class="text-left">
                    Hp ZBook 15
                </td>
                <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                    <input type="text" name="quantity" value="1" size="1" class="form-control" />
                    <span class="input-group-btn">
                    <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>
                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                    </span></div></td>
                <td class="text-right">3000.00</td>
                <td class="text-right">3000.00</td>
              </tr>
              <tr>
                <td class="text-center">
                    <img width="70px" src="{{ asset('frontend/image/demo/19.jpg') }}" class="img-thumbnail" />
                </td>
                <td class="text-left">
                    Vodafone Smart 6
                </td>
                <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                    <input type="text" name="quantity" value="1" size="1" class="form-control" />
                    <span class="input-group-btn">
                    <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"</i></button>
                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                    </span></div></td>
                <td class="text-right">1000.00</td>
                <td class="text-right">1000.00</td>
              </tr>
            </tbody>
          </table>
        </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="text-right">
                            <strong>Total:</strong>
                        </td>
                        <td class="text-right">4000.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

     <div class="buttons">
        <div class="pull-right"><a href="#" class="btn btn-primary">Check-out</a></div>
      </div>
    </div>
    <!--Middle Part End -->
    </div>
</div>
@stop
