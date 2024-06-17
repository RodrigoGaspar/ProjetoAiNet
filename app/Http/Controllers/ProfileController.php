<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $profiles = User::all();

        return view('profile.index', compact('profiles'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function toggleBlocked($id)
    {
        $perfil = User::findOrFail($id);

        // Inverte o estado de blocked
        $perfil->blocked = !$perfil->blocked;
        $perfil->save();

        return redirect()->back()->with('success', 'Estado de bloqueio alterado com sucesso.');
    }

    public function change($id)
    {
        $profile = User::findOrFail($id); // Carregar o perfil pelo ID

        return view('profile.change', compact('profile'));
    }

    public function changed(Request $request, $id)
    {
        $profile = User::findOrFail($id); // Encontrar o perfil pelo ID

        // Atualizar os campos do perfil com base nos dados do formulário
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->type = $request->input('type');

        $profile->save(); // Salvar as alterações

        // Redirecionar de volta para a página de detalhes do perfil ou outra rota após a atualização
        return redirect()->route('profile.index', $profile->id)->with('success', 'Profile updated successfully.');
    }

    public function softDelete($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Executar o soft delete (marcar como excluído)
        User::where('id', $id)->delete();

        // Restaurar restrições de chave estrangeira
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Redirecionar de volta para a página anterior ou outra rota após o delete
        return redirect()->route('profile.index')->with('success', 'Profile deleted successfully.');
    
    }
}
