@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">



            @if (\Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('success') !!}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            </div>
        </div>
        <div class="row">
            <!-- ******************************************************* -->

            <div class="col-120">
            <h1>Results</h1>
                <div class="card-columns">



                    @foreach($results as $result)

                        @foreach($result->cars as $car)

                            @if(\Carbon\Carbon::parse($car->aviability_date)->isBefore(\Carbon\Carbon::parse($start)))


                                <div class="card" style="padding: .5em;box-shadow: 1px 6px 20px 0px #9a9c9b54;">
                                    <img src="{{ $car->image }}" class="card-img-top" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="{{ $result->entreprise->logo_path  }}" alt="{{ $result->entreprise->logo_path   }}" width="50px" height="50px">
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-12 card-title"><strong>
                                                            {{ \App\models\brand::find($car->brand_id)->brand_name }}/
                                                            {{ \App\models\CarModel::find($car->model_id)->car_model_name }} -
                                                            {{ \App\models\CarModel::find($car->model_id)->car_model_year }}
                                                        </strong></div>
                                                    <div class="row">
                                                        <div class="col-12 card-subtitle text-muted">&nbsp;&nbsp;&nbsp;{{$car->type }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>delivery place :
                                                    <a href="https://maps.google.com/?q={{ $car->delivery_place }}">{{ $car->delivery_place }}</a>
                                                </h6>
                                                <p>
                                                    avialable on : {{ $car->aviability_date }}
                                                </p>
                                                <p>
                                                    <span class="badge badge-pill badge-primary">{{ $car->transmission }}</span>
                                                    <span class="badge badge-pill badge-success">
									{{ $car->fuel }}
                                                        @if ($car->fuel_policy == 'yes')
                                                            (full)
                                                        @endif
									</span>
                                                    @if($car->mileage_unlimited == 1)
                                                        <span class="badge badge-pill badge-info">unlimited mileage</span>
                                                    @endif
                                                    <span class="badge badge-pill badge-dark">{{ $car->seats }} seats</span>
                                                    <span class="badge badge-pill badge-light">{{ $car->luggage }} luggages</span>

                                                </p>


                                                @if(\Illuminate\Support\Facades\Auth::user() != null)
                                                    {!! Form::open(['method'=>'POST','action'=>'ReservationsController@store']) !!}
                                                    {{ Form::hidden('start', $start) }}
                                                    {{ Form::hidden('end', $end) }}
                                                    {{ Form::hidden('car_id', $car->id) }}
                                                    {{ Form::hidden('user_id',\Illuminate\Support\Facades\Auth::user()->id) }}
                                                    <button type="submit" class="btn btn-outline-info float-right">Rent {{ $car->price }} <strong>DH</strong>/<small><strong>day</strong></small></button>
                                                    {!! Form::close() !!}
                                                @else
                                                    <a href="/login" target="_blank" class="btn btn-outline-info float-right">{{ $car->price }}
                                                        <strong>DH</strong>/<small><strong>day</strong></small></a>

                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6"><h1>no cars found</h1></div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>

            <!-- ******************************************************* -->
        </div>
    </div>

@endsection