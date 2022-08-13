<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File; 

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' =>  Str::slug($request->username)]);

        $this->validate($request, [
            'username' => [
                'required', 
                'unique:users,username,' . auth()->user()->id, 
                'min:6', 'max:20', 
                'alpha_dash',
                'not_in:twitter,editar-perfil'
            ],
        ]);

        if($request->imagen) {

            // Eliminar la vieja imagen
            File::delete(public_path('perfiles') . "/" . auth()->user()->imagen);

            // Guardar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);

            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar en la base de datos
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ??  auth()->user()->imagen ?? null;
        $usuario->save();

        // Redirect
        return redirect()->route('posts.index', $usuario->username);

    }
}
