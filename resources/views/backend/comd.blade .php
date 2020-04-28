@extends('layouts.back')

@section('content')
			<main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Statistiques</h5>
								</div>
								<div class="card-body">
                                        <form action="{{ route('client.cmds') }}" method="post">
                                            @csrf
                                                 <div class="form-group" style="width: 50%;">
                                                    <label for="client">Client</label>
                                                    <select name="client_id" id="client" class="form-control">
                                                        <option value=""> --- Choisir Client --- </option>
                                                      @foreach($clients as $Client)
                                                        <option value="{{ $Client->id }}">{{ $Client->nom_client." ".$Client->prenom_client }}</option>
                                                      @endforeach
                                                    </select>
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Recherche</button>
                                                 </div>
                                                 <table id="datatables-buttons" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Date Commande</th>
                                                                <th>Messager</th>
                                                                <th>Employé</th>
                                                                <th>Destinataire</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($commandes as $cmd)
                                                            <tr>
                                                                <td>{{ $cmd->id }}</td>
                                                                <td>{{ $cmd->date_commande }}</td>
                                                                <td>{{ $cmd->messager->nom_message}}</td>
                                                                <td>{{ $cmd->user->nom_employe." ".$cmd->user->prenom_employe }}</td>
                                                                <td>{{ $cmd->destinataire }}</td>
                                                                <td>
                                                                    <a class="btn btn-primary btn-sm" href="#">
                                                                        <i class="fas fa-eye"></i> Détail
                                                                </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                        </form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
@stop
