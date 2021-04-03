<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Email;

class EmailController extends Controller
{

    public function getEmail($id_email = null) {
        $email = $id_email ? Email::find($id_email) : Email::all();
        if ($email) {
            return response()->json(['email' => $email], 200);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }


    public function create(Request $request) {
        try {
            $email = Email::create([
                'email' => $request->input('email'),
                'info' => $request->input('info'),
                'status' => $request->input('status')
            ]);
            return response()->json(['email' => $email, 'message' => 'CREATED'], 201);
        } catch (\Exception $err) {
            return response()->json(['message' => $err], 409);
        }
    }


    public function update(Request $request, $id_email) {
        try {
            $email = Email::where('id', $id_email)->update([
                'email' => $request->input('email'),
                'info' => $request->input('info'),
                'status' => $request->input('status')
            ]);
            $email->touch();
            return response()->json(['email' => $email, 'message' => 'UPDATED'], 201);
        } catch (\Exception $err) {
            return response()->json(['message' => $err], 409);
        }
    }

    public function delete($id_email) {
        try {
            $email = Email::findOrFail($id_email);
            $email->delete();
            return response()->json(['message' => 'DELETED'], 201);
        } catch (\Exception $err) {
            return response()->json(['message' => $err], 409);
        }
    }
}