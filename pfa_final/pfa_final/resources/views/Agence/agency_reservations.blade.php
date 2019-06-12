@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>My Reservations</h1>
        <div class="row">
            <div class="col-2"></div>
            <div class="card-columns">
                @foreach($agency->reservations as $reservation)

                            <div class="card" style="width: 18rem;">


                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('clients.show',[$reservation->client_id]) }}">

                            {{ \App\models\client::find($reservation->client_id)->first_name }}
                            ,
                            {{ \App\models\client::find($reservation->client_id)->last_name }}

                        </a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <a href="{{ route('cars.show',[$reservation->car_id])  }}">

                            {{ \App\models\brand::find(\App\models\car::find($reservation->car_id)->brand_id)->brand_name }}
                            /
                            {{ \App\models\CarModel::find(\App\models\car::find($reservation->car_id)->model_id)->car_model_name }}

                        </a>
                    </h6>
                        @if(\Carbon\Carbon::parse($reservation->start_date)->diffInDays(\Carbon\Carbon::parse(now())) < 1)
                        <p class="card-text" style="color:red;">
                        @else
                        <p class="card-text">
                        @endif
                            start date : {{ $reservation->start_date }} <br>
                            end date : {{ $reservation->end_date }} <br>
                        city : <a href="https://www.google.com/maps?q="{{ $reservation->city }}>{{ $reservation->city }}</a>
                    </p>
                    <div  class="card-link">
                        {!! Form::open(['method'=>'DELETE','route'=>['reservations.destroy',$reservation->id]]) !!}
                        {!!  Form::submit('Delete',['class'=>'btn btn-primary float-right']) !!}
                        {!! Form::close() !!}
                    </div>
                    @if(\Carbon\Carbon::parse($reservation->start_date)->diffInDays(\Carbon\Carbon::parse(now())) > 1)
                            @if($reservation->confirmed == 0)
                                <div  class="card-link">{!! link_to_route('reservations.edit','confimer',[$reservation->id],['class'=>'btn btn-warning float-right']) !!}</div>
@endif
                            @endif
                </div>
            </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection