<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Closure;
use App\User;
use Validator;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['status' => 2, 'msg' => 'Token and user id is required']);
        } else {
            if($request->header('Token') != '')
            {
                $check_token = User::where('id',$request->user_id)->where('remember_token',$request->header('Token'))->get();
                if(count($check_token) > 0)
                {
                    return $next($request);
                }
                else
                {
                    return response(['status' => 2, 'msg' => 'Invalid Token']);
                }
            }
            else
            {
                return response(['status' => 2, 'msg' => 'Token is required']);
            }
            
            //return ['status' =>2, 'msg' => 'Unathorized'];
        }

       //return $next($request);
    }
}
