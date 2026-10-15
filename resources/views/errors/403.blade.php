@extends('errors.layout')

@section('title', '403 - Quyền truy cập bị từ chối')
@section('code', '403')
@section('badge', 'Lỗi 403 • Truy cập bị hạn chế')
@section('badge_style', 'bg-red-50 text-red-700 border-red-200/80')
@section('headline', 'Bạn không có quyền truy cập trang này')

@section('message')
Khu vực này yêu cầu đặc quyền quản trị viên hoặc tài khoản của bạn chưa được cấp phép để xem tài nguyên này. Nếu bạn là quản trị viên, vui lòng đăng nhập vào tài khoản có thẩm quyền để tiếp tục.
@endsection
