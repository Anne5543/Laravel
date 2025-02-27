<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupport;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public readonly User $user;
    public function __construct(){
       $this->user = new User(); 
    }
    public function index()
    {
        $users = $this -> user -> all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupport $request)
    {
        $created = $this ->user->create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
        ]);

        if($created){
            return redirect()->back()->with('message', 'Successfully created');
        }
        return redirect()->back()->with('message', 'Error created');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('users_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupport $request, string $id)
    {
        $updated = $this-> user->where('id', $id) -> update($request->except(['_token', '_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }
        return redirect()->back()->with('message', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $this->user->where('id', $id)->delete();
    return redirect()->route('users.index');
}

}
