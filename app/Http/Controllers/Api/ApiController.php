<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register(Request $request)
    {
         $validated = Validator::make($request->all(),[
             'name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:8',
             'confirm_password' => 'required|same:password',
         ]);
         if($validated->fails())
         {
          return $validated->errors();
         }
         $input=$request->all();
         $input['password'] = Hash::make($request->password);
         $user=User::create($input);
         $success['token'] =  $user->createToken('MyApp')-> accessToken;
         $success['name'] =  $user->name;
         $success['email'] =  $user->email;
         return response()->json(['success'=>$success],$this->successStatus);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        //   $success['first_name'] =  $user->first_name;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        return response()->json(['success' => $success], $this-> successStatus);
    }
    else{
        return response()->json(['error'=>'Unauthorised'], 401);
    }
    }

    public function getalluser()
    {
        $user = User::all();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function single_user_get()
    {
        $user = Auth::guard('api')->user();
        if (isset($user->id))
        {
            return response()->json(['success' => $user]);
        }
        return response()->json(['success' => 'User Not Login']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json(['success' => $user], $this-> successStatus);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }

            $input = $request->all();

                $input['password'] = bcrypt($input['password']);
                $user->update($input);
                return response()->json(['success' => $user], $this->successStatus);
            }
            else
            {
                return response()->json(['success' => 'Data Not Found']);
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::guard('api')->user();
        $user->delete();
        if($user)
        {
            return response()->json(['message' => "Record Deleted Sucessfully"]);
        }
        else
        {
            return response()->json(['message' => "Record Not Deleted"]);
        }
    }
    public function logout(Request $request)
    {
        if (Auth::guard('api')->user()) {
            Auth::guard('api')->user()->token()->revoke();
        }
        return response()->json(['success' => 'Logout SuccessFully']);
    }

}
