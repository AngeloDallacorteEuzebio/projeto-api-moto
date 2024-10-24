<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotosController extends Controller
{
    public function salvar(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:15',
            'ano' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }
    
        $customer = Moto::create($request->all());
        return ApiResponse::ok('Moto salvo com sucesso', $customer);
       
    }

  

    public function excluir(int $id)
    {
        $customer = Moto::findOrFail($id);
        $customer->delete();  
        return ApiResponse::ok('Moto removido com sucesso');      
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:15',
        ]);
    
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }
        $customer = Moto::findOrFail($id);
        $customer->update($request->all());
        return ApiResponse::ok('Moto atualizado com sucesso', $customer); 
    }  

    public function listar()
    {
        $customers = Moto::all();
        return ApiResponse::ok('Lista de Moto', $customers);    
    }

    public function listarPeloID(int $id)
    {
        $customer = Moto::findOrFail($id);
        return ApiResponse::ok('Moto a ser listado.', $customer);  
    } 
}

