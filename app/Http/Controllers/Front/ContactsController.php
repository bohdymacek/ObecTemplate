<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Zobrazí stránku s kontakty.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Případně zde načtěte kontaktní data z databáze nebo jiné zdroje
        return view('contacts');
    }
}
