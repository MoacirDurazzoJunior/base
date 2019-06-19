<?php

namespace App\Http\Middleware;

use Closure;

use App\Log\LogEngine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Access
{
    /**
     * Handle an incoming request.
     * 
     * Verifica se o usuário logado:
     * - possui permissão para acessar uma dada rota
     * - é um super usuário
     * - se a dada rota pertence as rotas permitidas
     * Realiza registro de log de acesso
     * Redireciona para a página anterior caso o usuário não tenha permissão
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     * @author Moka
     */
    public function handle($request, Closure $next)
    {
        $log = new LogEngine();
        $route = Route::currentRouteName();

        // lista de rotas permitidas para qualquer usuário
        $allowed_routes = [
            'dashboard.index',
            'dashboard.perfil',
            'dashboard.update'
        ];

        if( Auth::user()->can( $route ) || Auth::user()->super || in_array($route, $allowed_routes) ){
            $log->acesso([
                'rota'      => $route,
                'usuario'   => Auth::user()->id,
                'permitido' => true
            ]);
            return $next($request);
        }else{
            $log->acesso([
                'rota'      => $route,
                'usuario'   => Auth::user()->id,
                'permitido' => false
            ]);
            return redirect()->back()->with('danger', 'Você não possui permissão para acessar este recurso');
        }
    }
}
