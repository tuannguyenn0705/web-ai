@extends('errors.layout')

@section('title', '404 - Không tìm thấy trang')
@section('code', '404')
@section('badge', 'Lỗi 404 • Trang không tồn tại')
@section('badge_style', 'bg-orange-50 text-orange-700 border-orange-200/80')
@section('headline', 'Không tìm thấy trang yêu cầu')

@section('message')
Đường dẫn bạn vừa nhập có thể không chính xác, đã bị thay đổi hoặc không còn tồn tại trên hệ thống AI Hub. Vui lòng kiểm tra lại địa chỉ URL hoặc dùng tính năng tìm kiếm để tìm nội dung bạn cần.
@endsection
