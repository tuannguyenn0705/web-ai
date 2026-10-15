@extends('errors.layout')

@section('title', '500 - Sự cố máy chủ')
@section('code', '500')
@section('badge', 'Lỗi 500 • Sự cố hệ thống')
@section('badge_style', 'bg-slate-100 text-slate-700 border-slate-300')
@section('headline', 'Đã xảy ra sự cố kỹ thuật')

@section('message')
Hệ thống máy chủ đang gặp trục trặc tạm thời khi xử lý yêu cầu của bạn. Toàn bộ thông tin sự cố đã được ghi nhận vào hệ thống nhật ký an toàn để bảo vệ bảo mật máy chủ. Đội ngũ kỹ thuật đang tiến hành xử lý, bạn vui lòng quay lại sau ít phút.
@endsection
