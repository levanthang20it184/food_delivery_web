<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Food;
use App\Models\FoodType;
use App\Models\Order;
use App\Models\User;

use Encore\Admin\Layout\Content;


class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
        $grid->model()->latest();
        $grid->column('id', __('Id'));
        $grid->column('customer.f_name', __('Name'));
        $grid->column('order_amount', __('Price'));
        $grid->column('order_status', __('Status'));
        $grid->column('payment_method', __('Method'));
        $grid->column('transaction_reference', __('Paypal'));
        $grid->column('confirmed', __('Date status'));
        $grid->column('order_note', __('Order Note'));
        $grid->column('delivery_address', __('Address'))->style('max-width:200px;word-break:break-all;')->display(function ($val){
            return substr($val,0,100);
        });
        $grid->column('otp', __('OTP'));
        $grid->column('created_at', __('Created_at'));
        $grid->column('updated_at', __('Updated_at'));

        return $grid;
    }


}
