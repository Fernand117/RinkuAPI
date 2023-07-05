<?php

namespace App\Http\Controllers;

use App\Models\NominaModel;
use Illuminate\Http\Request;

class NominasController extends ApiController
{
    public function ListaNominas()
    {
        $nominas = NominaModel::where('status', '=', 'true')->get();
        return $this->jsonResponse('Lista de nominas', $nominas);
    }

    public function ListaNominaID($id)
    {
        $nomina = NominaModel::where('status', '=', 'true', 'and', 'id_empleado', '=', $id)->get();

        return $this->jsonResponse('Nomina del empleado', $nomina);
    }

    public function RegistrarNomina(Request $request)
    {
        try {
            $datos = $request->all();
            $nomina = new NominaModel();
            $nomina->mes = $datos['mes'];
            $nomina->entregas = $datos['entregas'];
            $nomina->horas_trabajadas = $datos['horas_trabajadas'];
            $nomina->sueldo_bruto = $datos['sueldo_bruto'];
            $nomina->sueldo_neto = $datos['sueldo_neto'];
            $nomina->id_empleado = $datos['id_empleado'];
            $nomina->status = true;
            $nomina->save();

            return $this->jsonResponse('Nomina creada.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo crear la nomina', $ex->getMessage());
        }
    }

    public function EditarNomina(Request $request, $id)
    {
        try {
            $datos = $request->all();
            $nomina = NominaModel::find($id);
            $nomina->mes = $datos['mes'];
            $nomina->entregas = $datos['entregas'];
            $nomina->horas_trabajadas = $datos['horas_trabajadas'];
            $nomina->sueldo_bruto = $datos['sueldo_bruto'];
            $nomina->sueldo_neto = $datos['sueldo_neto'];
            $nomina->id_empleado = $datos['id_empleado'];
            $nomina->update();

            return $this->jsonResponse('Nomina creada.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo actualizar la nomina', $ex->getMessage());
        }
    }

    public function EliminarNomina($id)
    {
        try {
            $nomina = NominaModel::find($id);
            $nomina->status = false;
            $nomina->update();
            return $this->jsonResponse('Nomina eliminada.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo actualizar la nomina', $ex->getMessage());
        }
    }
}
