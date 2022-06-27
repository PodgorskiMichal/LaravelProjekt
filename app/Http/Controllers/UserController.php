<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use App\Models\ProductCategory;
use App\Models\User;

use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {

        $search = request()->query('search');
        if($search){
            $users = User::where('email', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('surname', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {


        if((Auth::user()-> role == 'user')&&(Auth::user() -> id))
        {
            return view("users.show", [
                'user' => $user
            ]);
        } else return view("users.show2", [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user): View
    {
        if(Auth::user()->role == 'user')
        {
            return view("users.edit2", [
                'user' => $user,
            ]);
        }
        else return view("users.edit", [
                'user' => $user,
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {

        $user->fill($request->all());
        $user->save();

        $addressValidated = $request -> validated()['address'];
        if($user->hasAddress()){
            $address = $user->address;
            $address->fill($addressValidated);
        }else {
            $address = new Address($addressValidated);
        }
        $user->address()->save($address);
        if(Auth::user()->role == 'user')
        return redirect(route('users.show', $user->id))->with('status', 'Dane użytkownika zostały zaktualizowany!');
        else
            return redirect(route('users.index'))->with('status', 'Adres został zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
           $user -> delete();
            Session::flash('status', 'Użytkownik został usunięty z bazy!');
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }
}
