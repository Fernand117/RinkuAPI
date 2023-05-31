<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoModel;
use App\Models\Views\ViewEmpleadosRoles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmpleadosController extends ApiController
{
    public function ListaEmpleados()
    {
        $empleados = ViewEmpleadosRoles::all();
        return $this->jsonResponse('Lista de empleados', $empleados);
    }

    public function RegistrarEmpleado(Request $request)
    {
        try {
            $datos = $request->all();
            $empleado = new EmpleadoModel();
            $fechaActual = Carbon::now();

            $empleado->nombre = $datos['nombre'];
            $empleado->paterno = $datos['paterno'];
            $empleado->materno = $datos['materno'];
            $empleado->fecha_nacimiento = $datos['fecha_nacimiento'];
            $empleado->numero_empleado = "E".$datos['id_rol']."-".$fechaActual->format('Ymd').$fechaActual->format('His');
            $empleado->id_rol = $datos['id_rol'];
            $empleado->status = true;
            $empleado->save();
            return $this->jsonResponse('Empleado registrado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo registrar el empleado.', $ex->getMessage());
        }
    }

    public function EditarEmpleado(Request $request, $id)
    {
        try {
            $datos = $request->all();
            $empleado = EmpleadoModel::find($id);
            $empleado->nombre = $datos['nombre'];
            $empleado->paterno = $datos['paterno'];
            $empleado->materno = $datos['materno'];
            $empleado->fecha_nacimiento = $datos['fecha_nacimiento'];
            $empleado->numero_empleado = $datos['numero_empleado'];
            $empleado->id_rol = $datos['id_rol'];
            $empleado->update();
            return $this->jsonResponse('Empleado actualizado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Error, no se pudo actualizar al empleado..', $ex->getMessage());
        }
    }

    public function EliminarEmpleado($id)
    {
        try {
            $empleado = EmpleadoModel::find($id);
            $empleado->status = false;
            $empleado->update();
            return $this->jsonResponse('Empleado eliminado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Error, no se pudo eliminar al empleado', $ex->getMessage());
        }
    }
}
