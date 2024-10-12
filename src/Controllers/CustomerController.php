<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function list()
    {
        $obj = new Customer();
        $customers = $obj->all();

        $template = 'customers';
        $data = [
            'title' => 'Customers',
            'items' => $customers
        ];

        $output = $this->render($template, $data);

        return $output;
    }

    public function single($id)
    {
        $obj = new Customer();
        $customer = $obj->getCustomer($id);

        $template = 'single-customer';
        $data = [
            'title' => 'Customer',
            'customer' => $customer
        ];

        $output = $this->render($template, $data);

        return $output;
    }

    public function update($id)
    {
        $obj = new Customer();
        $Customer = $obj->getCustomer($id);
        $Customer->fill($_POST);
        $result = $Customer->update();

        $template = 'single-customer';
        $data = [
            'title' => 'Customer',
            'customer' => $Customer
        ];

        $output = $this->render($template, $data);

        return $output;
    }
}