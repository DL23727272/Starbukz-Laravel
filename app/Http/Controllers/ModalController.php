<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function modals()
    {
        return view('components.modal.modals');
    }
}
