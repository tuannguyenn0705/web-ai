@extends('errors.layout')

@section('title', '429 - Quá nhiều yêu cầu')
@section('code', '429')
@section('badge', 'Lỗi 429 • Giới hạn tần suất')
@section('badge_style', 'bg-rose-50 text-rose-700 border-rose-200/80')
@section('headline', 'Bạn đang gửi yêu cầu quá nhanh')

@section('message')
Hệ thống AI Hub phát hiện tần suất gửi yêu cầu quá dày đặc từ địa chỉ IP của bạn nhằm bảo vệ máy chủ trước các nguy cơ tấn công từ chối dịch vụ (DDoS) và dò mật khẩu. Vui lòng tạm nghỉ trong giây lát rồi thử lại.
@endsection
