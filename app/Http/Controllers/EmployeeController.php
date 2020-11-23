<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response(
                Employee::all()
            );
        }
        $employees = Employee::latest()->paginate(10);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $avatar_path = '';

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('employees');
        }

        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar_path,
            'user_id' => $request->user()->id,
        ]);

        if (!$employee) {
            return redirect()->back()->with('error', 'Atención, existe un problema al crear el empleado');
        }
        return redirect()->route('employees.index')->with('success', 'En hora buena, El empleado ha sido creado ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        

        if ($request->hasFile('avatar')) {
            // eliminar imagen anterior
            if ($employee->avatar) {
                Storage::delete($employee->avatar);
            }
            
            // Almacenar imagen
            $avatar_path = $request->file('avatar')->store('employees');
            //Grabar en base de datos
            $employee->avatar = $avatar_path;
        }
        if (!$employee->save()) {
            return redirect()->back()->with('error', 'Lo siento, Hay un problema mientras se actualiza el empleado.' );
        }
        return redirect()->route('employees.index')->with('success', 'En hora buena, El empleado ha sido actualizado. ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->avatar) {
            Storage::delete($employee->avatar);
        }

        $employee->delete();

        return response()->json([
            'success' =>true
        ]);
    }

    public function exportempleadosPdf()
    {
        //$products = Product::orderBy('quantity', 'DESC')->paginate(20);
        $employees = Employee::orderBy('id','DESC')->paginate(20);
        $pdf = PDF::loadView('pdf.empleados', compact('employees'));

        return $pdf->download('empleados.pdf');
    }
}
