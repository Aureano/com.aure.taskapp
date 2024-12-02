<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\Role;
use App\Models\User;
use App\Models\Service;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Database\Eloquent\Builder;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $users = User::with('roles')->paginate(4);
        return view('admin.gestionuser.index',[
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestionuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user) :RedirectResponse
    {
         $request->validate([
           'name'=> ['required', 'string', 'max:255'],
           'email'=>['required','email','string','unique:'.User::class],
           'password'=>['required'],
           'poste'=>['min:3', 'max:255']

        ]);

       

         User::create([
            
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'service_id'=>1,
            'poste'=> $request->poste
            

    ]);


        return redirect()->route('admin.users.index')->with('success','Ajout du nouvel utilisateur effectué avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)

    {
        $enAttente = $user->assigned_task->where('status','en attente')->count();
        $new = $user->assigned_task->where('status','new')->count();
        $enCours = $user->assigned_task->where('status','en cours')->count();
        $terminée = $user->assigned_task->where('status','terminée')->count();

        return view('admin.gestionuser.show',compact('user','enAttente','new','terminée','enCours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) : View
    {
        $services = Service::all();
        $roles = Role::all();
        $user->load('roles');
        // $user->load('roles');
        return view('admin.gestionuser.edit',
        ['user'=>$user,
         'roles'=> $roles,
         'services'=>$services
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
       $request->validate(
        [
            'roles'=>['array','exists:roles,id'],
            'services'=>['required','exists:services,id']
        ]
       );
         $user->roles()->sync($request->input('roles'));
         $user->service_id = $request->services;
         $user->save();
         return redirect()->route('admin.users.index')->with('success','Nouvel utilisateur édité avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Suppression d\'utilisateur éffectué avec succès!');

    }

    public function empList()
    {
       $empLists = User::whereDoesntHave('roles', function(Builder $query)
       {
              $query->whereIn('name',['admin','create']);

       })
       ->where('service_id',Auth::User()->service_id)
       ->paginate(3);

       return view('admin.create.empList',compact('empLists'));

    }

    public function createEmpView()
    {
        return view('admin.create.createEmp');
    }

    public function createEmp(Request $request, Role $role)
    {

      $request->validate([
          'name'=> ['required', 'string', 'max:255'],
          'email'=>['required','email','string','unique:'.User::class],
          'password'=>['required'],
          'poste'=>['min:3', 'max:255']
      ]);



      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->poste = $request->poste;
      $user->password = Hash::make($request->password);
      $user->service_id = Auth::user()->service_id;
      $user->save();

      $role = Role::select('id')->where('name','users')->first();
      $user->roles()->attach($role);

      return redirect()->route('list')->with('success', "Nouvel utilisateur $user->name du service ".Auth::user()->service->nom." créé avec succès");

}
}
