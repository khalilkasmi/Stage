@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                @if(Auth::user()->myrole == 'Entreprise')
                        @include('Entreprise.entreprise_home')
                @elseif(Auth::user()->myrole == 'Client')

                        @include('Client.client_home')

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
