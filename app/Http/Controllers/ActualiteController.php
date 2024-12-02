<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Actualite::paginate(3);
        return view('admin.newsletter.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Actualite $news)
    {


    $request->validate([
       'nom'=>['required','string'],
       'description'=>['required','string'],
       'image'=>['required','image']
     ]);

      $filename = time().'.'.$request->image->extension();


     $path = $request->image->storeAs(
                   'avatar',
                   $filename,
                   'public'
                   );

                    

                Actualite::create([
                    'title'=>$request->nom,
                    'description'=>$request->description,
                    'image'=>$path
                ]);

       return redirect()->route('news.index')->with('success',"Nouvelle actualité mise en ligne avec succès!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actualite $news)
    {
       return view('admin.newsletter.show', compact('news'));
    }

    public function accShow()
    {
        $news = Actualite::all();
        return view('index', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actualite $news)
    {

        return view('admin.newsletter.edit', compact('news'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actualite $news)
    {
        $request->validate([
            'nom'=>['required','string'],
            'description'=>['required','string'],
            'image'=>['required','image']

        ]);


        $filename = time().'.'.$request->image->extension();


         $path = $request->image->storeAs(
                       'avatar',
                       $filename,
                       'public'
                       );



            $news->update([
                'title'=>$request->nom,
                'description'=>$request->description,
                'image'=>$path
            ]);

            return redirect()->route('news.index')->with('success',"Nouvelle actualité édité avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actualite $news)
    {
        $news->delete();
    }
}
