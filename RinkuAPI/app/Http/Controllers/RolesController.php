<?php

namespace App\Http\Controllers;

use App\Models\RolModel;
use Illuminate\Http\Request;

class RolesController extends ApiController
{
    public function ListaRoles()
    {
        $roles = RolModel::where('status', '=', 'true')->getAll();
        return $this->jsonResponse('Lista de roles', $roles);
    }

    public function RegistrarRole(Request $request)
    {
        try {
            $datos = $request->all();
            $rol = new RolModel();
            $rol->rol = $datos['rol'];
            $rol->status = true;
            $rol->save();
            return $this->jsonResponse('Rol registrado.', null);
        } catch (\Exception $ex) {
            return $this->jsonResponse('Ha ocurrido un error, no se pudo registrar el rol.', $ex->getMessage());
        }
    }

    public function EditarRole(Request $request, $id)
    {
        try {
            $datos = $request->all();
            $rol = RolModel::find($id);
            $rol->rol = $datos['rol'];
            $rol->update();
            return $this->jsonResponse('Rol editado.', null);
        } catch (\Exception $ex)
        {
            return $this->jsonResponse('Ocurrió un error, no se pudo editar el rol.', $ex->getMessage());
        }
    }

    public function EliminarRol($id)
    {
        try {
            $rol = RolModel::find($id);
            $rol->status = false;
            $rol->update();
            return $this->jsonResponse('Rol eliminado.', null);
        } catch (\Exception $ex)
        {
            return $this->jsonResponse('Ocurrió un error, no se ha podido eliminar el rol.', $ex->getMessage());
        }
    }
}
