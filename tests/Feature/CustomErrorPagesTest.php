<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomErrorPagesTest extends TestCase
{
    public function test_404_error_page_renders_with_custom_ui_and_no_backend_leak(): void
    {
        $response = $this->get('/duong-dan-khong-ton-tai-abc-xyz');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Không tìm thấy trang yêu cầu');
        $response->assertSee('Quay về trang chủ');
        $response->assertDontSee('NotFoundHttpException');
        $response->assertDontSee('Stack trace');
    }

    public function test_403_error_view_renders_cleanly(): void
    {
        $view = $this->view('errors.403');

        $view->assertSee('403');
        $view->assertSee('Bạn không có quyền truy cập trang này');
        $view->assertSee('Quay về trang chủ');
    }

    public function test_500_error_view_masks_backend_details(): void
    {
        $view = $this->view('errors.500');

        $view->assertSee('500');
        $view->assertSee('Đã xảy ra sự cố kỹ thuật');
        $view->assertDontSee('SQLSTATE');
        $view->assertDontSee('Exception');
        $view->assertDontSee('Stack trace');
    }

    public function test_419_error_view_renders_cleanly(): void
    {
        $view = $this->view('errors.419');

        $view->assertSee('419');
        $view->assertSee('Phiên làm việc đã hết hạn');
    }

    public function test_429_error_view_renders_cleanly(): void
    {
        $view = $this->view('errors.429');

        $view->assertSee('429');
        $view->assertSee('Bạn đang gửi yêu cầu quá nhanh');
    }

    public function test_503_error_view_renders_cleanly(): void
    {
        $view = $this->view('errors.503');

        $view->assertSee('503');
        $view->assertSee('Website đang được bảo trì định kỳ');
    }
}
