<?php

namespace App\Http\Controllers;

use App\Models\TipoSalarioModel;
use Illuminate\Http\Request;

class TipoSalariosController extends ApiController
{
    public function ListaTipoSalarios()
    {
        $tipos = TipoSalarioModel::where('status', '=', 'true')->get();
        return $this->jsonResponse('Lista de tipos de sueldos', $tipos);
    }

    public function RegistrarTipoSueldo(Request $request)
    {
        try
        {
            $datos = $request->all();
            $tipo = new TipoSalarioModel();
            $tipo->tipo = $datos['tipo'];
            $tipo->status = true;
            $tipo->save();
            return $this->jsonResponse('Tipo de sueldo guardado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo guardar la información', $ex->getMessage());
        }
    }

    public function EditarTipoSueldo(Request $request, $id)
    {
        try
        {
            $datos = $request->all();
            $tipo = TipoSalarioModel::find($id);
            $tipo->tipo = $datos['tipo'];
            $tipo->update();
            return $this->jsonResponse('Tipo de sueldo actualizado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo guardar la información', $ex->getMessage());
        }
    }

    public function EliminarTipoSueldo($id)
    {
        try
        {
            $tipo = TipoSalarioModel::find($id);
            $tipo->status = false;
            $tipo->update();
            return $this->jsonResponse('Tipo de sueldo eliminado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo guardar la información', $ex->getMessage());
        }
    }
}
