<?php

namespace App\Controllers;

use App\Models\Responsavel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

session();

class Responsavels extends BaseController
{
    public function index()
    {
        return view('responsavel.php');
    }

    public function responsaveis()
    {
        
        $validated = $this->validate([
            'cpf'   => 'required|min_length[11]|max_length[14]',
            'senha' => 'required|min_length[6]',
            'tipo'  => 'required'   
        ], 
        [
            'cpf' => [
                'required'   => 'CPF é obrigatório',
                'min_length' => 'O CPF deve ter pelo menos 11 caracteres.',
                'max_length' => 'O CPF não pode ter mais de 14 caracteres.'
            ],
            'senha' => [
                'required'   => 'Senha obrigatória',
                'min_length' => 'A senha deve ter no mínimo 6 caracteres.'
            ]
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

       
        $responsavel = new Responsavel();

        $responsavelFound = $responsavel->select('cpf, senha')->where('cpf', $this->request->getPost('cpf'))->first();

        if (!$responsavelFound) {
            return redirect()->back()->with('error', 'CPF ou Senha inválidos.');
        }

        if (!password_verify($this->request->getPost('senha'), $responsavel->senha)) {
            return redirect()->back()->with('error', 'CPF ou Senha inválidos.');
        }

        if (is_array($responsavelFound)) {
            unset($responsavelFound['senha']);
        } else {
            unset($responsavelFound->senha);
        }

        session()->set('Responsavel', $responsavelFound);
        print_r(session()->get('Responsavel'));

         return redirect()->to('/home'); 
    }
}
