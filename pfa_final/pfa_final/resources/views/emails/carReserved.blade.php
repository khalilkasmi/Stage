<div class="card">
    <div class="card-header">
       <div class="card-title"> Thank you <3</div>
        <span class="text-green">your reservation has been confirmed</span>
    </div>
    <div class="card-body">
        <h3 class="text-center">Reservation Details</h3>
        <div class="row">
            <h6>Delivery place : {{ $reservation->city }}</h6>
            <h6>car : </h6>
            <p>
                {{ \App\models\brand::find(\App\models\car::find($reservation->car_id)->brand_id)->brand_name }}
                /
                {{ \App\models\CarModel::find(\App\models\car::find($reservation->car_id)->model_id)->car_model_name }}
            </p>
            <h6> start date : {{ $reservation->start_date }} </h6>
            <h6> end date : {{ $reservation->end_date }} </h6>
            <h1>price to pay : {{$reservation->total_to_pay}}</h1>

        </div>
    </div>
</div>