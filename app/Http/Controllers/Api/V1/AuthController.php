<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/v1/send_sms",
     *  tags={"Auth Api"},
     *  description="use for send verification sms to user",
     * @OA\RequestBody(
     *    required=true,
     * *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="id",
     *                  description="Enter mobile number or Email Address",
     *                  type="string",
     *               ),
     *     )
     *   )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function sendSms(Request $request)
    {
        $id = $request->id;
        $type = 0;
        if(filter_var($id, FILTER_VALIDATE_EMAIL))
            $type = 1;
        elseif(!preg_match('/^[0-9]{11}+$/', $id))
            return response()->json(['status' => false, 'message' => 'please send email address or mobile number' , 'data' => []], 401);

        // check two minutes
        $check = Otp::query()->where([['login_id' , '=' , $id],['created_at' , '>' , Carbon::now()->subMinutes(2)]])->first();
        if($check)
            return response()->json(['status' => false, 'message' => 'please wait two minute' , 'data' => []], 401);

        // send sms
        $code = rand(10000,99999);
        $otp = Otp::query()->create(['code' => $code , 'login_id' => $id , 'type' => $type]);
        return response()->json(['status' => true, 'message' => 'otp send successfully' , 'data' => ['code' => $code , 'type' => $type == 0 ? 'mobile' : 'email' , 'id' => $id]], 201);

    }

    /**
     * @OA\Post(
     ** path="/api/v1/login_or_register",
     *  tags={"Auth Api"},
     *  description="verify code and login or register",
     * @OA\RequestBody(
     *    required=true,
     * *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="id",
     *                  description="Enter mobile number or Email Address",
     *                  type="string",
     *               ),
     *          @OA\Property(
     *                  property="code",
     *                  description="Enter send code",
     *                  type="string",
     *               ),
     *     )
     *   )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function loginOrRegister(Request $request)
    {
        $login_id = $request->id;
        $code = $request->code;
        // check is true code
        $otp = Otp::query()->where([['login_id' , '=' , $login_id],['code' , '=' , $code]])->first();
        if($otp)
        {
            $user = User::query()->where('email' , $login_id)->orWhere('mobile' , $login_id)->first();
            // if $user true user login or no user created
            if($user)
            {
                return response()->json(['status' => true, 'message' => 'login success' , 'data' => ['id' => $user->id , 'token' => $user->createToken('new Token')->plainTextToken]], 201);
            }
            else
            {
                $login_id_field = $otp->type == 0 ? 'mobile' : 'email';
                $password = rand(1111,9999);
                $new_user = User::query()->create([
                    $login_id_field => $login_id,
                    'password' => Hash::make($password),
                    'status' => 1
                ]);
                return response()->json(['status' => true, 'message' => 'register success' , 'data' => ['id' => $new_user->id , 'token' => $new_user->createToken('new Token')->plainTextToken]], 201);
            }
        }
        else
        {
            return response()->json(['status' => false, 'message' => 'code not found' , 'data' => []], 401);
        }
    }
}
