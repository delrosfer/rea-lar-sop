<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\SupplierStoreRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Storage;

class SupplierController extends Controller
{
    public function index()
    {
    	if (request()->wantsJson()) {
            return response(
                Supplier::all()
            );
        }
        $suppliers = Supplier::latest()->paginate(10);
        return view('suppliers.index')->with('suppliers', $suppliers);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(SupplierStoreRequest $request)
    {
        $avatar_path = '';

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('suppliers');
        }

        $supplier = Supplier::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar_path,
            'user_id' => $request->user()->id,
        ]);

        if (!$supplier) {
            return redirect()->back()->with('error', 'Atención, existe un problema al crear el proveedor');
        }
        return redirect()->route('suppliers.index')->with('success', 'En hora buena, El proveedor ha sido creado ');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->first_name = $request->first_name;
        $supplier->last_name = $request->last_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        

        if ($request->hasFile('avatar')) {
            // eliminar imagen anterior
            if ($supplier->avatar) {
                Storage::delete($supplier->avatar);
            }
            
            // Almacenar imagen
            $avatar_path = $request->file('avatar')->store('suppliers');
            //Grabar en base de datos
            $supplier->avatar = $avatar_path;
        }
        if (!$supplier->save()) {
            return redirect()->back()->with('error', 'Lo siento, Hay un problema mientras se actualiza el proveedor.' );
        }
        return redirect()->route('suppliers.index')->with('success', 'En hora buena, El proveedor ha sido actualizado. ');
    }

    public function destroy(Supplier $supplier)
    {
        if ($supplier->avatar) {
            Storage::delete($supplier->avatar);
        }

        $supplier->delete();

        return response()->json([
            'success' =>true
        ]);
    }

    public function exportproveedoresPdf()
    {
        //$products = Product::orderBy('quantity', 'DESC')->paginate(20);
        $suppliers = Supplier::orderBy('id','DESC')->paginate(20);
        $pdf = PDF::loadView('pdf.proveedores', compact('suppliers'));

        return $pdf->download('proveedores.pdf');
    }
}
