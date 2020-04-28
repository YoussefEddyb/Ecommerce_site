@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Statistiques</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Graphes</h5>
                                            </div>
                                            <div class="card-body">
                                                    <div style="width: 50%">
                                                            {!! $prods->container() !!}
                                                    </div>
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
 {{-- ChartScript --}}
 @if($prods)
 {!! $prods->script() !!}
 @endif
@endsection
