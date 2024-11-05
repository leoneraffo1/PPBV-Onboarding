<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::join("course_has_users", "course_has_users.user_fk", "=", "users.id")
            ->where("course_has_users.course_fk", $request->course)
            ->select(
                "users.*",
                DB::raw("ROUND(
            (SELECT COUNT(1) FROM card_view_users WHERE user_fk = users.id) /
            (SELECT COUNT(1) FROM cards WHERE course_fk = $request->course) * 100,2
        ) AS view_percentage")
            )
            ->get();
        return  $users;
    }

    public function auth(Request $request)
    {

        // if($request->has())

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('home');
        } else {
            dd('nao logado');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(["message" => "Usuário deletado com sucesso"]);
    }
}
