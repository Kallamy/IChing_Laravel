<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ask;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AskController extends Controller
{
    public function save(Request $request)
    {

        $data = $request->all();

        Ask::create([
            'date' => new DateTime(),
            'subject' => $request->subject,
            'result' => $request->result,
            'related' => $request->related,
            'result_lines' => $request->result_lines,
            'related_lines' => $request->related_lines,
            'user_id' => auth()->id(),
        ]);

        return response()->json(['success' => true, 'message' => 'Dados recebidos com sucesso!']);
    }
}
