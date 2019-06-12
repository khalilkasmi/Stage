@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">

                        make a search

                    </div>
                    <div class="card-body">

                        <form action="search" method="GET">
                        @csrf

                        <div class="row">
                            <div class="col-12">

                                <div class="input-group mb-3">
                                    <input type="text" name="search_city" class="form-control @error('search_city') is-invalid @enderror" placeholder="search by city" aria-label="search by city" >
                                    <div class="input-group-append">
                                    </div>
                                    @error('search_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="start_date">Start Date</label>
                                <div class="input-group mb-3">
                                    <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" >
                                    <div class="input-group-append">
                                    </div>
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="end_date">End Date</label>
                                <div class="input-group mb-3">

                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" >
                                    <div class="input-group-append">
                                    </div>
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>


                        </form>

                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <br>
       @if(\Illuminate\Support\Facades\Auth::user() != null)
            <div class="row">
    <h1>My Reservations</h1>

                            <div class="container">
                               <div class="row">
                                   <div class="card-columns">
                                       @foreach(\Illuminate\Support\Facades\Auth::user()->client->reservations as $res)

                                           <div class="card" style="padding: .5em;box-shadow: 1px 6px 20px 0px #9a9c9b54;">
                                               <img src="{{ \App\models\car::find($res->car_id)->image }}" class="card-img-top" >
                                               <div class="card-body">
                                                   <div class="row">
                                                       <div class="col-3">
                                                           <img src="{{ \App\models\Agence::find($res->agence_id)->entreprise->logo_path  }}" alt="{{ \App\models\Agence::find($res->agence_id)->entreprise->logo_path   }}" width="50px" height="50px">
                                                       </div>
                                                       <div class="col-9">
                                                           <div class="row">
                                                               <div class="col-12 card-title"><strong>
                                                                       {{ \App\models\brand::find(\App\models\car::find($res->car_id)->brand_id)->brand_name }}/
                                                                       {{ \App\models\CarModel::find(\App\models\car::find($res->car_id)->model_id)->car_model_name }} -
                                                                       {{ \App\models\CarModel::find(\App\models\car::find($res->car_id)->model_id)->car_model_year }}
                                                                   </strong></div>
                                                               <div class="row">
                                                                   <div class="col-12 card-subtitle text-muted">&nbsp;&nbsp;&nbsp;{{\App\models\car::find($res->car_id)->type }}</div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="card-text">
                                                   <div class="row">
                                                       <div class="col-12">
                                                           <h6>delivery place :
                                                               <a href="https://maps.google.com/?q={{ \App\models\car::find($res->car_id)->delivery_place }}">{{ \App\models\car::find($res->car_id)->delivery_place }}</a>
                                                           </h6>
                                                           <p>
                                                               starts on : {{ $res->start_date  }}
                                                               ends on : {{ $res->end_date }} <br>
                                                               price :
                                                               <span class="btn btn-outline-primary">{{ \App\models\car::find($res->car_id)->price}} <strong><small>DH</small></strong>/<small>day</small></span><br>
                                                               Total to pay :
                                                               <span class="btn btn-outline-danger">{{ $res->total_to_pay}} <strong>DH</strong></span>
                                                           </p>
                                                           <p>
                                                               <span class="badge badge-pill badge-primary">{{ \App\models\car::find($res->car_id)->transmission }}</span>
                                                               <span class="badge badge-pill badge-success">
									{{ \App\models\car::find($res->car_id)->fuel }}
                                                                   @if (\App\models\car::find($res->car_id)->fuel_policy == 'yes')
                                                                       (full)
                                                                   @endif
									</span>
                                                               @if(\App\models\car::find($res->car_id)->mileage_unlimited == 1)
                                                                   <span class="badge badge-pill badge-info">unlimited mileage</span>
                                                               @endif
                                                               <span class="badge badge-pill badge-dark">{{ \App\models\car::find($res->car_id)->seats }} seats</span>
                                                               <span class="badge badge-pill badge-light">{{ \App\models\car::find($res->car_id)->luggage }} luggages</span>

                                                           </p>

                                                           @if($res->confirmed == 0)
                                                               <span class="btn btn-outline-warning">pending ...</span>
                                                           @else
                                                               <span class="btn btn-outline-success">Confirmed</span>
                                                           @endif


                                                           {!! Form::open(['method'=>'DELETE','route'=>['reservations.destroy',$res->id]]) !!}
                                                           {!!  Form::submit('Cancel',['class'=>'btn btn-danger float-right']) !!}
                                                           {!! Form::close() !!}
                                                       </div>

                                                   </div>
                                               </div>
                                           </div>
                                           @endforeach
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>

        @endif
    </div>



@endsection


