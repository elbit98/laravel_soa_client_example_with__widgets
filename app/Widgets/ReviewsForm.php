<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ReviewsForm extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['page_uid' => 0, 'all' => []];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.reviews_form', [
            'config' => $this->config,
        ]);
    }
}
