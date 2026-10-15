@extends('layouts.admin')

@section('title', 'Chỉnh sửa bài viết')
@section('header_title', 'Chỉnh sửa bài viết')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
        border-color: #e2e8f0;
        background-color: #f8fafc;
        padding: 12px 14px;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
        border-color: #e2e8f0;
        font-family: inherit;
        font-size: 0.95rem;
        background-color: #ffffff;
    }
    .ql-editor {
        min-height: 440px;
        line-height: 1.75;
        color: #1e293b;
    }
    .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
    }
    .ql-snow .ql-picker.ql-header {
        width: 110px;
    }
    .ql-snow .ql-picker.ql-size {
        width: 100px;
    }
</style>
@endpush

@section('header_actions')
<div class="flex items-center gap-2">
    <a href="{{ route('posts.show', $post->slug) }}" target="_blank"
       class="inline-flex items-center text-sm font-medium text-orange-700 hover:text-orange-900 bg-orange-50 border border-orange-200/60 px-3.5 py-2 rounded-xl transition shadow-xs">
        Xem trên Client
    </a>
    <a href="{{ route('admin.posts.index') }}" 
       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 bg-white border border-gray-200 px-4 py-2 rounded-xl transition shadow-xs hover:bg-gray-50">
        Danh sách bài viết
    </a>
</div>
@endsection

@section('content')
<form id="postEditForm" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-2xl text-sm">
            <p class="font-semibold mb-1">Vui lòng kiểm tra lại thông tin:</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- CỘT TRÁI (2/3): Tiêu đề, Tóm tắt, Trình soạn thảo Word/Excel WYSIWYG --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Tiêu đề & Tóm tắt --}}
            <div class="bg-white p-6 rounded-2xl border border-gray-200/90 shadow-xs space-y-5">
                <div>
                    <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Tiêu Đề Bài Viết <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" required value="{{ old('title', $post->title) }}"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                    <p class="text-xs text-gray-400 font-mono mt-1">Đường dẫn: /bai-viet/{{ $post->slug }}</p>
                </div>

                {{-- Tóm tắt ngắn (Excerpt) --}}
                <div>
                    <label for="excerpt" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Tóm Tắt Ngắn (Excerpt / Sapo)
                    </label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent leading-relaxed">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
            </div>

            {{-- Trình soạn thảo Nội dung chi tiết bài viết (Word / Excel WYSIWYG) --}}
            <div class="bg-white p-6 rounded-2xl border border-gray-200/90 shadow-xs space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700">
                            Nội Dung Chi Tiết Bài Viết <span class="text-red-500">*</span>
                        </label>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Định dạng Word/Excel: Cỡ chữ, Tô đậm, In nghiêng, Gạch chân, Gạch ngang, Chọn màu chữ, Căn lề, Chèn ảnh (Click chọn ảnh hoặc Paste trực tiếp Ctrl+V).
                        </p>
                    </div>
                    <span id="uploadStatusBadge" class="hidden text-xs font-medium text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg border border-orange-200 animate-pulse">
                        Đang tải ảnh lên máy chủ...
                    </span>
                </div>

                {{-- Container trình soạn thảo Quill --}}
                <div class="space-y-0">
                    <div id="quillEditorContainer"></div>
                </div>

                {{-- Input ẩn để chứa HTML đồng bộ lên Laravel request --}}
                <input type="hidden" name="content" id="content_input" value="{{ old('content', $post->content) }}">
            </div>
        </div>

        {{-- CỘT PHẢI (1/3): Cấu hình xuất bản, phân loại, ảnh đại diện --}}
        <div class="space-y-6">
            {{-- Box Hành động Cập nhật --}}
            <div class="bg-white p-5 rounded-2xl border border-gray-200/90 shadow-xs space-y-4">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">
                    Cập Nhật Trạng Thái
                </h3>

                {{-- Trạng thái --}}
                <div>
                    <label for="status" class="block text-xs font-medium text-gray-600 mb-1.5">Trạng Thái Đăng</label>
                    <select name="status" id="status" class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900">
                        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>
                            Xuất bản (Hiển thị Client)
                        </option>
                        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>
                            Lưu bản nháp (Draft)
                        </option>
                        <option value="archived" {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>
                            Lưu trữ (Archived)
                        </option>
                    </select>
                </div>

                {{-- Bài viết nổi bật --}}
                <div class="pt-2 border-t border-gray-100">
                    <label class="flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}
                               class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                        <span class="text-sm font-medium text-gray-800">Đặt làm bài viết nổi bật</span>
                    </label>
                </div>

                {{-- Thống kê nhanh --}}
                <div class="pt-2 border-t border-gray-100 text-xs text-gray-500 space-y-1.5">
                    <div class="flex justify-between">
                        <span>Lượt xem:</span>
                        <span class="font-mono font-semibold text-gray-800">{{ number_format($post->views_count) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tác giả:</span>
                        <span class="font-medium text-gray-800">{{ $post->author->name ?? 'Admin' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Ngày tạo:</span>
                        <span>{{ $post->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>

                {{-- Nút Lưu thay đổi --}}
                <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                    <button type="submit" 
                            class="w-full py-2.5 px-4 bg-gray-950 hover:bg-gray-800 text-white rounded-xl text-sm font-semibold transition shadow-xs text-center cursor-pointer">
                        Lưu Thay Đổi Bài Viết
                    </button>
                    <a href="{{ route('admin.posts.index') }}" 
                       class="w-full py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-medium transition text-center">
                        Hủy Bỏ
                    </a>
                </div>
            </div>

            {{-- Box Phân loại & Chuyên mục --}}
            <div class="bg-white p-5 rounded-2xl border border-gray-200/90 shadow-xs space-y-4">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">
                    Phân Loại Bài Viết
                </h3>

                {{-- Loại bài viết (4 nhóm chức năng) --}}
                <div>
                    <label for="type" class="block text-xs font-medium text-gray-600 mb-1.5">
                        Loại Nội Dung <span class="text-red-500">*</span>
                    </label>
                    <select name="type" id="type" required class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900">
                        <option value="news" {{ old('type', $post->type) === 'news' ? 'selected' : '' }}>Tin tức AI</option>
                        <option value="review" {{ old('type', $post->type) === 'review' ? 'selected' : '' }}>Đánh giá (Review)</option>
                        <option value="tutorial" {{ old('type', $post->type) === 'tutorial' ? 'selected' : '' }}>Hướng dẫn (Tutorial)</option>
                        <option value="update" {{ old('type', $post->type) === 'update' ? 'selected' : '' }}>Cập nhật AI</option>
                    </select>
                </div>

                {{-- Chuyên mục --}}
                <div>
                    <label for="category_id" class="block text-xs font-medium text-gray-600 mb-1.5">
                        Chuyên Mục <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" required class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Box Ảnh đại diện --}}
            <div class="bg-white p-5 rounded-2xl border border-gray-200/90 shadow-xs space-y-3">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">
                    Ảnh Đại Diện (Thumbnail)
                </h3>
                @if($post->featured_image)
                    <div class="relative rounded-xl overflow-hidden border border-gray-200 mb-2 aspect-video bg-gray-100">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                @endif
                <label for="featured_image" class="block text-xs text-gray-500">Thay đổi ảnh đại diện:</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*"
                       class="block w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition cursor-pointer">
                <p class="text-xs text-gray-400">Định dạng JPG, PNG, WEBP tối đa 5MB</p>
            </div>

            {{-- Box Thẻ Tags --}}
            @if($tags->count())
                @php
                    $currentTagIds = $post->tags->pluck('id')->toArray();
                @endphp
                <div class="bg-white p-5 rounded-2xl border border-gray-200/90 shadow-xs space-y-3">
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">
                        Gắn Thẻ (Tags)
                    </h3>
                    <div class="max-h-48 overflow-y-auto space-y-2 pr-1">
                        @foreach($tags as $tag)
                            <label class="flex items-center gap-2 text-xs text-gray-700 hover:text-gray-900 cursor-pointer select-none">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                       {{ in_array($tag->id, old('tags', $currentTagIds)) ? 'checked' : '' }}
                                       class="h-3.5 w-3.5 text-gray-900 focus:ring-gray-900 border-gray-300 rounded">
                                <span>#{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Cấu hình thanh công cụ trực quan đầy đủ như Microsoft Word
    const toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        ['link', 'image', 'blockquote', 'code-block'],
        ['clean']
    ];

    // Khởi tạo Quill Editor
    const quill = new Quill('#quillEditorContainer', {
        theme: 'snow',
        placeholder: 'Nhập nội dung bài viết vào đây...',
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    image: handleImageUploadTrigger
                }
            }
        }
    });

    const contentInput = document.getElementById('content_input');
    const statusBadge = document.getElementById('uploadStatusBadge');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Nạp nội dung hiện tại của bài viết
    const initialContent = {!! json_encode(old('content', $post->content)) !!};
    if (initialContent) {
        quill.root.innerHTML = initialContent;
    }

    // Đồng bộ nội dung vào hidden input khi người dùng gõ
    quill.on('text-change', function() {
        contentInput.value = quill.root.innerHTML;
    });

    // Hàm xử lý upload ảnh lên máy chủ
    async function uploadAndInsertFile(file) {
        if (!file.type.startsWith('image/')) {
            alert('Vui lòng chỉ chọn tệp hình ảnh!');
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('Dung lượng hình ảnh vượt quá 5MB. Vui lòng chọn ảnh nhỏ hơn!');
            return;
        }

        statusBadge.classList.remove('hidden');

        const formData = new FormData();
        formData.append('image', file);

        try {
            const response = await fetch("{{ route('admin.posts.upload-image') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();
            statusBadge.classList.add('hidden');

            if (data.success && data.url) {
                const range = quill.getSelection(true) || { index: quill.getLength() };
                quill.insertEmbed(range.index, 'image', data.url);
                quill.setSelection(range.index + 1);
                contentInput.value = quill.root.innerHTML;
            } else {
                alert('Tải ảnh thất bại: ' + (data.message || 'Không thể lưu ảnh.'));
            }
        } catch (error) {
            statusBadge.classList.add('hidden');
            console.error('Lỗi tải ảnh:', error);
            alert('Có lỗi mạng hoặc máy chủ khi tải ảnh lên.');
        }
    }

    // Khi người dùng bấm nút chèn ảnh trên thanh công cụ
    function handleImageUploadTrigger() {
        const fileInput = document.createElement('input');
        fileInput.setAttribute('type', 'file');
        fileInput.setAttribute('accept', 'image/jpeg,image/png,image/jpg,image/webp,image/gif');
        fileInput.click();

        fileInput.onchange = () => {
            const file = fileInput.files[0];
            if (file) {
                uploadAndInsertFile(file);
            }
        };
    }

    // Hỗ trợ dán ảnh trực tiếp từ Clipboard (Ctrl + V)
    quill.root.addEventListener('paste', function (e) {
        const clipboardData = e.clipboardData || window.clipboardData;
        if (clipboardData && clipboardData.files && clipboardData.files.length > 0) {
            const file = clipboardData.files[0];
            if (file.type.startsWith('image/')) {
                e.preventDefault();
                uploadAndInsertFile(file);
            }
        }
    });

    // Khi gửi biểu mẫu form: kiểm tra và gán nội dung
    const postEditForm = document.getElementById('postEditForm');
    postEditForm.addEventListener('submit', function (e) {
        const rawText = quill.getText().trim();
        const hasImages = quill.root.querySelector('img') !== null;
        
        if (!rawText && !hasImages) {
            contentInput.value = '';
            alert('Vui lòng nhập nội dung bài viết trước khi lưu!');
            e.preventDefault();
            return false;
        }

        contentInput.value = quill.root.innerHTML;
    });
});
</script>
@endpush
