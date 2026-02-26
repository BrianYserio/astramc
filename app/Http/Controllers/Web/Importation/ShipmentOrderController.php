<?php

namespace App\Http\Controllers\Web\Importation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipmentOrderController extends Controller
{
    public function index() {
        return view('module.importation.shipment-order.index');
    }

    public function create() {
        return view('module.importation.shipment-order.create');
    }
}
