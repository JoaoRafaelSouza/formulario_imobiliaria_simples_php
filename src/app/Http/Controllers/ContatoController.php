<?php
// app/Http/Controllers/ContatoController.php
namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'mensagem' => 'required|string',
        ]);

        // $id = DB::table('contatos')->insertGetId([
        //     'nome' => $validated['nome'],
        //     'email' => $validated['email'],
        //     'mensagem' => $validated['mensagem'],
        //     'telefone' => $validated['telefone'],
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $contato = Contato::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'mensagem' => $validated['mensagem'],
            'telefone' => $request->input('telefone', ''),
            'dt_cad' => now(),
        ]);

        Mail::raw("Nova mensagem de {$validated['nome']}: {$validated['mensagem']}", function ($message) use ($validated) {
            $message->to($validated['email'])
                ->subject('Confirmação de contato');
        });

        return redirect('/')->with('success', 'Mensagem enviada com sucesso!');
    }
}