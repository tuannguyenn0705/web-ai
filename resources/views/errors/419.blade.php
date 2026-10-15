@extends('errors.layout')

@section('title', '419 - Hết hạn phiên làm việc')
@section('code', '419')
@section('badge', 'Lỗi 419 • Hết hạn phiên làm việc')
@section('badge_style', 'bg-amber-50 text-amber-700 border-amber-200/80')
@section('headline', 'Phiên làm việc đã hết hạn')

@section('message')
Trang web đã ở trạng thái chờ quá lâu hoặc mã bảo mật phiên (CSRF Token) đã được làm mới để bảo vệ an toàn cho tài khoản của bạn. Vui lòng tải lại trang và thực hiện lại thao tác.
@endsection
