<style>
    /* Định dạng Bảng gọn gàng, hiện đại ngay trong khung soạn thảo Admin */
    .ql-editor table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 1.25rem 0;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        overflow: hidden;
        background-color: #ffffff;
        font-size: 0.92rem;
        line-height: 1.55;
    }

    .ql-editor table td,
    .ql-editor table th {
        padding: 10px 14px;
        border-bottom: 1px solid #e2e8f0;
        border-right: 1px solid #e2e8f0;
        color: #334155;
        vertical-align: top;
        min-width: 70px;
    }

    .ql-editor table tr td:last-child,
    .ql-editor table tr th:last-child {
        border-right: none;
    }

    .ql-editor table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Hàng đầu tiên tự động hiển thị như dòng tiêu đề bảng (Header Row) */
    .ql-editor table tbody tr:first-child td,
    .ql-editor table thead th {
        background-color: #f8fafc;
        color: #0f172a;
        font-weight: 700;
        border-bottom: 1.5px solid #cbd5e1;
    }

    /* Hộp chọn kích thước bảng trực quan (giống Word / Google Docs) */
    .table-grid-popover {
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        z-index: 80;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px;
        box-shadow: 0 14px 34px -4px rgba(15, 23, 42, 0.18);
        width: 236px;
        user-select: none;
    }

    .table-grid-title {
        font-family: 'Inter', sans-serif;
        font-size: 11.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        text-align: center;
        letter-spacing: -0.01em;
    }

    .table-grid-cells {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 3.5px;
        margin-bottom: 10px;
    }

    .table-grid-cell {
        width: 16px;
        height: 16px;
        border-radius: 3.5px;
        border: 1px solid #cbd5e1;
        background-color: #f8fafc;
        cursor: pointer;
        transition: all 0.08s ease;
    }

    .table-grid-cell.active {
        background-color: #ffedd5;
        border-color: #ea580c;
        box-shadow: 0 0 0 1px #ea580c;
    }

    /* Khối tùy chỉnh số dòng & cột không giới hạn */
    .table-custom-divider {
        display: flex;
        align-items: center;
        margin: 8px 0 10px;
        color: #94a3b8;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        font-weight: 700;
        font-family: 'Inter', sans-serif;
    }
    .table-custom-divider::before,
    .table-custom-divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #e2e8f0;
    }
    .table-custom-divider span {
        padding: 0 6px;
    }

    .table-custom-form {
        display: flex;
        align-items: flex-end;
        gap: 6px;
        font-family: 'Inter', sans-serif;
    }
    .table-custom-field {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 3px;
    }
    .table-custom-field label {
        font-size: 10px;
        font-weight: 600;
        color: #64748b;
    }
    .table-custom-field input {
        width: 100%;
        padding: 5px 6px;
        border: 1px solid #cbd5e1;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        color: #0f172a;
        text-align: center;
        outline: none;
        background: #ffffff;
        transition: all 0.15s ease;
    }
    .table-custom-field input:focus {
        border-color: #ea580c;
        box-shadow: 0 0 0 2px rgba(234, 88, 12, 0.18);
    }
    .table-custom-times {
        font-size: 13px;
        font-weight: 700;
        color: #94a3b8;
        padding-bottom: 7px;
    }
    .table-custom-submit-btn {
        padding: 6px 10px;
        background-color: #ea580c;
        color: #ffffff;
        border: none;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s ease;
        white-space: nowrap;
        margin-bottom: 0;
        height: 29px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .table-custom-submit-btn:hover {
        background-color: #c2410c;
    }

    /* Thanh công cụ chỉnh sửa bảng thông minh (hiện khi đặt con trỏ trong bảng) */
    .table-context-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        background-color: #f8fafc;
        border-left: 1px solid #e2e8f0;
        border-right: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
        font-family: 'Inter', sans-serif;
        font-size: 11.5px;
    }

    .table-context-bar.hidden {
        display: none !important;
    }

    .table-context-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 9px;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
        background-color: #ffffff;
        color: #1e293b;
        font-weight: 600;
        font-size: 11px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .table-context-btn:hover {
        background-color: #f1f5f9;
        border-color: #94a3b8;
    }

    .table-context-btn.primary {
        color: #c2410c;
        border-color: #fed7aa;
        background-color: #fff7ed;
    }

    .table-context-btn.primary:hover {
        background-color: #ffedd5;
        border-color: #fb923c;
    }

    .table-context-btn.danger {
        color: #dc2626;
        border-color: #fecaca;
        background-color: #fef2f2;
    }

    .table-context-btn.danger:hover {
        background-color: #fee2e2;
        border-color: #f87171;
    }
</style>

<script>
/**
 * Chuẩn hóa HTML bảng khi Paste từ Gemini, ChatGPT, Word, Excel, Google Docs
 * để Quill 2.0 giữ nguyên 100% số dòng, số cột và tiêu đề in đậm.
 */
function normalizeTablesInHtml(html) {
    if (!html || !/<table/i.test(html)) {
        return html;
    }

    const doc = (new DOMParser()).parseFromString(html, 'text/html');
    doc.querySelectorAll('table').forEach(table => {
        // Loại bỏ các thẻ chú thích phụ (citation footnotes của Gemini/ChatGPT) trong bảng
        table.querySelectorAll('source-footnote, sup, button, svg, script, style').forEach(el => el.remove());

        // Chuyển <th> thành <td><strong>...</strong></td> để Quill 2.0 nhận diện đúng cột tiêu đề
        table.querySelectorAll('th').forEach(th => {
            const td = doc.createElement('td');
            const strong = doc.createElement('strong');
            while (th.firstChild) {
                strong.appendChild(th.firstChild);
            }
            td.appendChild(strong);
            th.replaceWith(td);
        });

        // Gom các dòng trong thead / tfoot vào tbody theo đúng thứ tự
        let tbody = table.querySelector('tbody');
        if (!tbody) {
            tbody = doc.createElement('tbody');
            table.appendChild(tbody);
        }

        const thead = table.querySelector('thead');
        if (thead) {
            const headRows = Array.from(thead.querySelectorAll('tr'));
            headRows.reverse().forEach(tr => {
                tbody.insertBefore(tr, tbody.firstChild);
            });
            thead.remove();
        }

        const tfoot = table.querySelector('tfoot');
        if (tfoot) {
            Array.from(tfoot.querySelectorAll('tr')).forEach(tr => {
                tbody.appendChild(tr);
            });
            tfoot.remove();
        }

        // Làm phẳng các thẻ block (<p>, <div>, <li>) bên trong từng ô <td> để tránh bị tách nhầm thành nhiều ô
        table.querySelectorAll('td').forEach(td => {
            td.querySelectorAll('p, div, li, h1, h2, h3, h4, h5, h6').forEach((block, idx) => {
                const span = doc.createElement('span');
                while (block.firstChild) {
                    span.appendChild(block.firstChild);
                }
                if (idx > 0 && span.textContent.trim()) {
                    td.insertBefore(doc.createTextNode(' • '), block);
                }
                block.replaceWith(span);
            });

            td.querySelectorAll('ul, ol').forEach(list => {
                const span = doc.createElement('span');
                while (list.firstChild) {
                    span.appendChild(list.firstChild);
                }
                list.replaceWith(span);
            });

            td.querySelectorAll('br').forEach(br => {
                br.replaceWith(doc.createTextNode(' '));
            });

            if (!td.textContent || td.textContent.trim() === '') {
                td.textContent = '\u00a0';
            }
        });
    });

    return doc.body.innerHTML;
}

/**
 * Khởi tạo bộ công cụ Tạo bảng, Chỉnh sửa bảng và Copy-Paste bảng cho Quill 2.0
 */
function initQuillTableSupport(quill, contentInput) {
    const tableModule = quill.getModule('table');
    const toolbarModule = quill.getModule('toolbar');
    const toolbarEl = toolbarModule ? toolbarModule.container : null;
    if (!tableModule || !toolbarEl) return;

    // 1. Hook bộ chuyển đổi Clipboard của Quill để hỗ trợ Paste bảng từ Gemini / Word / Excel
    const origConvert = quill.clipboard.convert.bind(quill.clipboard);
    quill.clipboard.convert = function({ html, text }, formats = {}) {
        if (html && /<table/i.test(html)) {
            html = normalizeTablesInHtml(html);
        }
        return origConvert({ html, text }, formats);
    };

    // 2. Tạo thanh điều khiển bảng thông minh (hiện ngay dưới thanh công cụ khi đặt chuột vào bảng)
    const contextBar = document.createElement('div');
    contextBar.id = 'tableContextBar';
    contextBar.className = 'table-context-bar hidden';
    contextBar.innerHTML = `
        <span class="text-xs font-bold text-slate-700 mr-1">Chỉnh sửa bảng:</span>
        <button type="button" class="table-context-btn" data-action="row-above">+ Hàng trên</button>
        <button type="button" class="table-context-btn" data-action="row-below">+ Hàng dưới</button>
        <button type="button" class="table-context-btn primary" data-action="add-multiple-rows" title="Thêm nhiều hàng cùng lúc">+ Thêm nhiều hàng...</button>
        <button type="button" class="table-context-btn" data-action="col-left">+ Cột trái</button>
        <button type="button" class="table-context-btn" data-action="col-right">+ Cột phải</button>
        <span class="w-px h-4 bg-slate-200 mx-0.5"></span>
        <button type="button" class="table-context-btn danger" data-action="del-row">Xóa hàng</button>
        <button type="button" class="table-context-btn danger" data-action="del-col">Xóa cột</button>
        <button type="button" class="table-context-btn danger" data-action="del-table">Xóa bảng</button>
    `;

    quill.container.parentNode.insertBefore(contextBar, quill.container);

    contextBar.querySelectorAll('button[data-action]').forEach(btn => {
        btn.addEventListener('mousedown', function(e) {
            e.preventDefault(); // Giữ nguyên vị trí con trỏ trong ô bảng
            const action = this.getAttribute('data-action');
            switch (action) {
                case 'row-above': tableModule.insertRowAbove(); break;
                case 'row-below': tableModule.insertRowBelow(); break;
                case 'add-multiple-rows': {
                    const countStr = prompt('Nhập số hàng bạn muốn chèn thêm vào phía dưới:', '5');
                    const count = parseInt(countStr, 10);
                    if (!isNaN(count) && count > 0 && count <= 100) {
                        for (let i = 0; i < count; i++) {
                            tableModule.insertRowBelow();
                        }
                    }
                    break;
                }
                case 'col-left':  tableModule.insertColumnLeft(); break;
                case 'col-right': tableModule.insertColumnRight(); break;
                case 'del-row':   tableModule.deleteRow(); break;
                case 'del-col':   tableModule.deleteColumn(); break;
                case 'del-table':
                    if (confirm('Bạn có chắc muốn xóa toàn bộ bảng này?')) {
                        tableModule.deleteTable();
                        contextBar.classList.add('hidden');
                    }
                    break;
            }
            if (contentInput) {
                contentInput.value = quill.root.innerHTML;
            }
        });
    });

    // Tự động ẩn/hiện thanh chỉnh sửa bảng khi con trỏ nằm trong bảng
    function updateTableContextVisibility() {
        const range = quill.getSelection();
        if (!range) return;
        const [tableContainer] = tableModule.getTable(range);
        if (tableContainer) {
            contextBar.classList.remove('hidden');
        } else {
            contextBar.classList.add('hidden');
        }
    }

    quill.on('selection-change', updateTableContextVisibility);
    quill.root.addEventListener('click', updateTableContextVisibility);

    // 3. Tạo hộp chọn kích thước bảng trực quan (Grid Picker 10x10 & Custom Form) gắn vào nút Table
    const tableBtn = toolbarEl.querySelector('button.ql-table');
    if (tableBtn) {
        tableBtn.style.position = 'relative';
        const wrapper = document.createElement('div');
        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-flex';
        tableBtn.parentNode.insertBefore(wrapper, tableBtn);
        wrapper.appendChild(tableBtn);

        const popover = document.createElement('div');
        popover.className = 'table-grid-popover hidden';

        const titleEl = document.createElement('div');
        titleEl.className = 'table-grid-title';
        titleEl.textContent = 'Chèn bảng: 3 × 3';
        popover.appendChild(titleEl);

        const gridEl = document.createElement('div');
        gridEl.className = 'table-grid-cells';

        // Lưới trực quan mở rộng thành 10 hàng x 10 cột
        const maxRows = 10;
        const maxCols = 10;
        const cells = [];

        function insertTableWithSize(rows, cols) {
            popover.classList.add('hidden');
            quill.focus();
            const range = quill.getSelection(true) || { index: quill.getLength() - 1, length: 0 };
            quill.setSelection(range.index, 0, 'silent');
            tableModule.insertTable(rows, cols);

            if (contentInput) {
                contentInput.value = quill.root.innerHTML;
            }
            setTimeout(updateTableContextVisibility, 50);
        }

        function highlightGrid(rows, cols) {
            titleEl.textContent = `Chèn bảng: ${rows} hàng × ${cols} cột`;
            cells.forEach(c => {
                if (c.r <= rows && c.c <= cols) {
                    c.el.classList.add('active');
                } else {
                    c.el.classList.remove('active');
                }
            });
            if (customRowsInput && customColsInput) {
                customRowsInput.value = rows;
                customColsInput.value = cols;
            }
        }

        for (let r = 1; r <= maxRows; r++) {
            for (let c = 1; c <= maxCols; c++) {
                const cell = document.createElement('div');
                cell.className = 'table-grid-cell';
                cell.addEventListener('mouseenter', () => highlightGrid(r, c));
                cell.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    insertTableWithSize(r, c);
                });
                gridEl.appendChild(cell);
                cells.push({ r, c, el: cell });
            }
        }

        popover.appendChild(gridEl);

        // Khối tùy chỉnh kích thước hàng x cột (cho phép bảng lớn tùy ý 15x6, 20x8...)
        const customBox = document.createElement('div');
        customBox.innerHTML = `
            <div class="table-custom-divider"><span>Hoặc nhập số lượng tùy ý</span></div>
            <div class="table-custom-form">
                <div class="table-custom-field">
                    <label for="tableCustomRowsInput">Số hàng</label>
                    <input type="number" id="tableCustomRowsInput" min="1" max="100" value="12" />
                </div>
                <span class="table-custom-times">×</span>
                <div class="table-custom-field">
                    <label for="tableCustomColsInput">Số cột</label>
                    <input type="number" id="tableCustomColsInput" min="1" max="25" value="6" />
                </div>
                <button type="button" class="table-custom-submit-btn" id="tableCustomSubmitBtn">Tạo bảng</button>
            </div>
        `;
        popover.appendChild(customBox);

        const customRowsInput = customBox.querySelector('#tableCustomRowsInput');
        const customColsInput = customBox.querySelector('#tableCustomColsInput');
        const customSubmitBtn = customBox.querySelector('#tableCustomSubmitBtn');

        // Ngăn chặn sự kiện mousedown ở các ô input làm đóng popover
        customBox.addEventListener('mousedown', (e) => {
            e.stopPropagation();
        });

        function handleCustomTableSubmit() {
            let r = parseInt(customRowsInput.value, 10);
            let c = parseInt(customColsInput.value, 10);
            if (isNaN(r) || r < 1) r = 1;
            if (r > 100) r = 100;
            if (isNaN(c) || c < 1) c = 1;
            if (c > 30) c = 30;

            insertTableWithSize(r, c);
        }

        customSubmitBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            handleCustomTableSubmit();
        });

        [customRowsInput, customColsInput].forEach(inp => {
            inp.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleCustomTableSubmit();
                }
            });
        });

        wrapper.appendChild(popover);

        // Bấm nút Table trên thanh công cụ -> Bật/tắt bảng chọn kích thước
        tableBtn.addEventListener('mousedown', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const isHidden = popover.classList.contains('hidden');
            if (isHidden) {
                highlightGrid(3, 3);
                popover.classList.remove('hidden');
            } else {
                popover.classList.add('hidden');
            }
        });

        document.addEventListener('mousedown', function(e) {
            if (!wrapper.contains(e.target)) {
                popover.classList.add('hidden');
            }
        });
    }
}
</script>
