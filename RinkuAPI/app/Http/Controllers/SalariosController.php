<?php

namespace App\Http\Controllers;

use App\Models\SalarioModel;
use Illuminate\Http\Request;

class SalariosController extends ApiController
{
    public function ListaSalarios()
    {
        $salarios = SalarioModel::where('status', '=', 'true')->get();
        return $this->jsonResponse('Lista de salarios', $salarios);
    }

    public function RegistrarSalario(Request $request)
    {
        try
        {
            $datos = $request->all();
            $salario = new SalarioModel();
            $salario->salario = $datos['salario'];
            $salario->id_tipo = $datos['id_tipo'];
            $salario->status = true;
            $salario->save();
            return $this->jsonResponse('Salario guardado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo registrar el salario.', $ex->getMessage());
        }
    }

    public function EditarSalario(Request $request, $id)
    {
        try
        {
            $datos = $request->all();
            $salario = SalarioModel::find($id);
            $salario->salario = $datos['salario'];
            $salario->id_tipo = $datos['id_tipo'];
            $salario->update();
            return $this->jsonResponse('Salario actualizado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo actualizar el salario.', $ex->getMessage());
        }
    }

    public function EliminarSalario($id)
    {
        try
        {
            $salario = SalarioModel::find($id);
            $salario->status = false;
            return $this->jsonResponse('Salario eliminado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ocurrió un error, no se pudo actualizar el salario.', $ex->getMessage());
        }
    }
}
