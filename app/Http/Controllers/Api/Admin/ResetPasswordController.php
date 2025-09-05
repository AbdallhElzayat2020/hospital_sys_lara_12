<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendResetPasswordLinkMail;

class ResetPasswordController extends Controller
{


    protected $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }


    public function forgotPassword(Request $request): ?\Illuminate\Http\JsonResponse
    {
        // or Validation class
        $request->validate([
            'email' => 'required|email|exists:admins,email'
        ]);
        $user = Admin::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        try {
            $otp = $this->otp->generate($request->email, 'numeric', 6, 10);
            Mail::to($request->email)->send(new SendResetPasswordLinkMail($otp->token));

            return response()->json([
                'status' => 'success',
                'message' => 'email sent successfully',
            ], 200);
        } catch (\Exception $e) {
            \Log::error('OTP Email Error: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'failed to send email please try again',
            ], 500);
        }
    }


    public function verifyOtp(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'token' => 'required|string|size:6',
        ]);
        $user = Admin::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'المستخدم غير موجود',
            ], 404);
        }
        $otp = $this->otp->validate($request->email, $request->token);

        if (!$otp->status) {
            return response()->json([
                'status' => 'error',
                'message' => 'invalid otp',
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Verified successfully',
            'verified' => true,
        ], 200);
    }

    public function resetPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        // or validate in Class Request
        $request->validate([
            'token' => ['required', 'min:6'],
            'email' => ['required', 'exists:admins,email', 'max:100'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);

        $user = Admin::whereEmail($request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        $otp = $this->otp->validate($request->email, $request->token);

        if (!$otp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid OTP',
            ], 400);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Password reset successfully',
        ], 200);
    }
}
