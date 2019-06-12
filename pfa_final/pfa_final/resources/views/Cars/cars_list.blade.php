@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <h3>My cars</h3>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <a href="/agences/{{$agency->id}}/cars/add" class="btn btn-primary float-right">add a car </a>
                </div>
            </div>

            <div class="container">
                <div class="card-columns">
                    @foreach($agency->cars as $car)
                        <div class="card" style="padding: .5em;box-shadow: 1px 6px 20px 0px #9a9c9b54;">
                            <img src="{{ $car->image }}"  alt="{{ $car->image }}" class="card-img-top" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="\{{ \App\models\Agence::find($car->agence_id)->entreprise->logo_path }}" alt="logo" width="50px" height="50px">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-12 card-title"><strong>
                                                    {{ \App\models\brand::find($car->brand_id)->brand_name }}/
                                                    {{ \App\models\CarModel::find($car->model_id)->car_model_name }} -
                                                    {{ \App\models\CarModel::find($car->model_id)->car_model_year }}
                                                </strong></div>
                                            <div class="row">
                                                <div class="col-12 card-subtitle text-muted">{{$car->type  }}</div>
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


                                        {!! Form::open(['method'=>'DELETE','route'=>['cars.destroy',$car->id]]) !!}
                                        {!!  Form::submit('Delete',['class'=>'btn btn-primary float-right']) !!}
                                        {!! Form::close() !!}

                                        {!! link_to_route('cars.edit','update',[$car->id],['class'=>'btn btn-warning float-right']) !!}


                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection