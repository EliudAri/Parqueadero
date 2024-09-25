<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class propietarios extends Controller
{
    /**
     * Display a listing of the propietarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los propietarios
        $propietarios = Propietarios::all();
        return response()->json($propietarios);
    }

    /**
     * Store a newly created propietario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de la petición
        $request->validate([
            'nombre' => 'required|string|max:255',
            'identificacion' => 'required|string|max:255|unique:propietarios',
            'cantidadDeVehiculos' => 'required|integer',
            'placaVehiculo' => 'required|string|max:255|unique:propietarios',
            'email' => 'required|string|email|max:255|unique:propietarios',
            'password' => 'required|string|min:8',
        ]);

        // Crear el propietario
        $propietario = Propietarios::create([
            'nombre' => $request->nombre,
            'identificacion' => $request->identificacion,
            'cantidadDeVehiculos' => $request->cantidadDeVehiculos,
            'placaVehiculo' => $request->placaVehiculo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($propietario, 201);
    }

    /**
     * Display the specified propietario.
     *
     * @param  \App\Models\Propietarios  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar un propietario por su ID
        $propietario = Propietarios::findOrFail($id);
        return response()->json($propietario);
    }

    /**
     * Update the specified propietario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietarios  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos de la petición
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'identificacion' => 'sometimes|required|string|max:255|unique:propietarios,identificacion,' . $id,
            'cantidadDeVehiculos' => 'sometimes|required|integer',
            'placaVehiculo' => 'sometimes|required|string|max:255|unique:propietarios,placaVehiculo,' . $id,
            'email' => 'sometimes|required|string|email|max:255|unique:propietarios,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        // Actualizar los datos del propietario
        $propietario = Propietarios::findOrFail($id);
        $propietario->update([
            'nombre' => $request->nombre ?? $propietario->nombre,
            'identificacion' => $request->identificacion ?? $propietario->identificacion,
            'cantidadDeVehiculos' => $request->cantidadDeVehiculos ?? $propietario->cantidadDeVehiculos,
            'placaVehiculo' => $request->placaVehiculo ?? $propietario->placaVehiculo,
            'email' => $request->email ?? $propietario->email,
            'password' => $request->password ? Hash::make($request->password) : $propietario->password,
        ]);

        return response()->json($propietario);
    }

    /**
     * Remove the specified propietario from storage.
     *
     * @param  \App\Models\Propietarios  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un propietario
        $propietario = Propietarios::findOrFail($id);
        $propietario->delete();

        return response()->json(['message' => 'Propietario eliminado correctamente']);
    }
}
