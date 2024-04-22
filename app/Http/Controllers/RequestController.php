<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Demande;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequestsExport;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->input('phone');
        $query = Demande::orderBy('created_at', 'desc');
        if ($search){
            $query->where('phone', '=', $search);
        }
        $requests = $query->paginate(20);
        $requests->appends(['phone' => $search]);
        return view('admin.requests', compact('requests', 'search'));
    }

    public function downloadExcel()
    {
        return Excel::download(new RequestsExport, 'Demandes.xlsx');        
    }
}
