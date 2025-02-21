<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Member;
use ParagonIE\Paseto\{
    Paseto,
    ProtocolVersion,
    Keys\SymmetricKey
};

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login_id = $request->id;
        $login_password = $request->password;

        $user = Member::where('login_id', $login_id)->first();

        if (!$user) {
            return response()->json([
                'error' => '아이디를 다시 확인해주세요.'
            ], 401);
        }

        if (!Hash::check($login_password, $user->password)) {
            return response()->json([
                'error' => '비밀번호를 다시 확인해주세요.'
            ], 401);
        }

        $symmetricKey = new SymmetricKey(
            ProtocolVersion::v2(), 
            env('PASETO_SYMMETRIC_KEY')
        );

        // 토큰 만료시간을 1시간으로 설정 (프로젝트 요구사항에 따라 조정 가능)
        $expiration = (new \DateTime())->add(new \DateInterval('PT1H'));
        
        $token = Paseto::create()
            ->setKey($symmetricKey)
            ->setExpiration($expiration)
            ->set('member_id', $member->id)
            ->toString();
        
        // 4. Laravel Auth 클래스를 이용해 로그인 처리 (세션 기반 인증)
        Auth::login($member);
        
        // 5. 로그인 성공 시 토큰과 사용자 정보를 리턴
        return response()->json([
            'message' => 'Login successful',
            'token'   => $token,
            'user'    => $member,
        ]);
    }
}
