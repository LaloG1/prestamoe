<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('cliente')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create(Request $request)
    {
        $clientes = Cliente::all();
        $cliente_id = $request->input('cliente_id'); // Para pasar el cliente desde el botón "Nuevo préstamo" en clientes.show
        return view('prestamos.create', compact('clientes', 'cliente_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'interes' => 'required|numeric|min:0',
            'estado' => 'required|string|in:pendiente,pagado,atrasado',
            'notas' => 'nullable|string',
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado correctamente');
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load('cliente');
        return view('prestamos.show', compact('prestamo'));
    }

    // PrestamoController.php
    public function edit(Prestamo $prestamo)
    {
        $clientes = Cliente::all(); // Asegúrate de importar el modelo Cliente

        if (request()->ajax()) {
            return view('prestamos._form', compact('prestamo', 'clientes'));
        }

        return view('prestamos.edit', compact('prestamo', 'clientes'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'interes' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $prestamo->update([
            'monto' => $request->monto,
            'interes' => $request->interes,
            'estado' => $request->estado
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }


    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente');
    }
}
