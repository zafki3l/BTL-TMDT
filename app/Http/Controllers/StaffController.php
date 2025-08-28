<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class StaffController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        return view('staff.dashboard');
    }
}
