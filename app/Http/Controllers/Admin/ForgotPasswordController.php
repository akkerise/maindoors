<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\Admin\AdminForgotPasswordRequest;
use App\Mail\ForgotPassword;
// use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller {
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function getForgotPassword() {
		return view('adminlte.pages.forgotpassword');
	}

	public function postForgotPassword(AdminForgotPasswordRequest $request) {
		$emailForgot = $request->email;
		$userForgot  = $this->userRepository->getUserByAttr('email', $emailForgot)->first();
		$idForgot    = $userForgot->id;
		if (!empty($userForgot)) {
			$md5Forgot = Hash::make($userForgot->fullname.$userForgot->username.$userForgot->confirm_code);
			Mail::to($request->email)->send(new ForgotPassword($idForgot, $md5Forgot));
			return redirect()->route('admin.login.getLogin')->with([
					'msgAlert' => 'Bạn gửi mail thành công , hãy kiểm tra lại hòm mail',
					'lvlAlert' => 'success'
				]);
		} else {
			return redirect()->route('admin.forgot.getForgotPassword')->with([
					'msgAlert' => 'Email của bạn không tồn tại !',
					'lvlAlert' => 'danger'
				]);
		}
	}

	public function checkForgot($idForgot, $md5Forgot) {
		$userForgot = $this->userRepository->findId($idForgot);
		if (Hash::check($userForgot->fullname.$userForgot->username.$userForgot->confirm_code, $md5Forgot) === false) {
			return redirect()->route('admin.login.getLogin')->with([
					'msgAlert' => 'Có thể bạn bị giả mạo hoặc đường link xác nhận không đúng !',
					'lvlAlert' => 'danger'
				]);
		}
		return view('adminlte.pages.resetpassword')->with([
				'idForgot'  => $idForgot,
				'md5Forgot' => $md5Forgot,
				'msgAlert'  => 'Bạn đã xác minh hãy đổi mật khẩu trước khi đăng nhập !',
				'lvlAlert'  => 'success'
			]);
	}

	public function resetPassword(AdminResetPasswordRequest $request) {
		$userForgot = $this->userRepository->findId($request->idForgot);
		if (Hash::check($userForgot->fullname.$userForgot->username.$userForgot->confirm_code, $request->md5Forgot)) {
			$userForgot->password = Hash::make($request->password);
			$userForgot->save();
			return redirect()->route('admin.login.getLogin')->with([
					'msgAlert' => 'Bạn đã đổi password thành công . Bạn hãy đăng nhập bằng mật khẩu mới !',
					'lvlAlert' => 'success'
				]);
		} else {
			$userForgot->save();
			return redirect()->route('error503');
		}
	}
}
