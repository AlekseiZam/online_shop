<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function getManufacturer(){
        $manufacturer = Manufacturer::all();
    }

    public function delManufacturer(){
        $manufacturer = Manufacturer::all();
    }

    public function updateManufacturer(){
        $manufacturer = Manufacturer::all();
    }

    public function insertManufacturer(){
        $manufacturer = Manufacturer::all();
    }
}
