<?php

namespace App\Widgets;

use App\Reservation;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Reservationswidget extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Reservation::count();
        $string = 'Reservations';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-ticket',
            'title'  => "{$count} {$string}",
            'text'   => __('', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('Reservations'),
                'link' => route('voyager.reservations.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/reservations-bg.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
