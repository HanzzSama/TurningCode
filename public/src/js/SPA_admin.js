document.addEventListener("DOMContentLoaded", function () {

    function loadPage(url, push = true) {
        const params = new URLSearchParams(url);
        const page = params.get("page") || "dashboard";

        const fullUrl = "/admin/page/" + page;

fetch(fullUrl)
            .then(async res => {
                console.log('SPA fetch:', fullUrl, 'Status:', res.status);
                if (!res.ok) {
                    const errorText = await res.text();
                    console.error('Fetch error:', fullUrl, res.status, errorText.substring(0, 500));
                    throw new Error(`HTTP ${res.status}: ${fullUrl}`);
                }
                return res.text();
            })
            .then(html => {
                console.log('SPA loaded:', fullUrl);
                const container = document.getElementById("main-content");
                if (!container) {
                    console.error('No #main-content found');
                    return;
                }
                container.innerHTML = html;
                if (push) {
                    history.pushState({}, "", "?page=" + page);
                }
                initAll();
            })
            .catch(err => {
                console.error('SPA load failed:', fullUrl, err);
                const container = document.getElementById("main-content");
                if (container) {
                    container.innerHTML = `<h2>Error loading ${page}: ${err.message}</h2><p>Check console (F12) for details.</p>`;
                }
            });
    }

    function initAll() {
        bindLinks();
        initUploadSubMateri();
        initEditor();
        autoSave();
        loadDraft();
    }

    function bindLinks() {
        document.querySelectorAll(".link-spa").forEach(link => {
            link.onclick = function (e) {
                e.preventDefault();
                loadPage(this.getAttribute("href"));
            };
        });
    }

    /*
    =========================
    🔥 SUB MATERI SELECT
    =========================
    */
    function initUploadSubMateri() {

        const mainSelect = document.getElementById('mainSelect');
        if (!mainSelect) return;

        const materiSelect = document.getElementById('materiSelect');
        const materiWrapper = document.getElementById('materiWrapper');
        const formWrapper = document.getElementById('formWrapper');

        const dataMain = window.dataMain || [];

        mainSelect.onchange = function () {

            materiSelect.innerHTML = '<option value="">-- pilih materi --</option>';
            formWrapper.style.display = 'none';

            const selected = dataMain.find(m => m.id == this.value);

            if (selected && selected.materis.length > 0) {

                materiWrapper.style.display = 'block';

                selected.materis.forEach(materi => {
                    const option = document.createElement('option');
                    option.value = materi.id;
                    option.textContent = materi.title;
                    materiSelect.appendChild(option);
                });

            } else {
                materiWrapper.style.display = 'none';
            }
        };

        materiSelect.onchange = function () {

            if (this.value) {
                formWrapper.style.display = 'block';

                if (!document.querySelector('.section-item')) {
                    addSection('content');
                }

            } else {
                formWrapper.style.display = 'none';
            }
        };
    }

    /*
    =========================
    🔥 QUILL EDITOR (FIXED)
    =========================
    */
    function initEditor() {

        document.querySelectorAll('.editor').forEach(el => {

            if (el.dataset.initialized) return;

            const inputName = el.dataset.name;

            // 🔥 FIX: scope ke parent
            const hidden = el.parentElement.querySelector(`input[name="${inputName}"]`);
            if (!hidden) return;

            const quill = new Quill(el, {
                theme: 'snow'
            });

            el.dataset.initialized = "true";

            quill.on('text-change', function () {
                hidden.value = quill.root.innerHTML;
            });
        });
    }

    /*
    =========================
    🔥 ADD SECTION (FIXED)
    =========================
    */
    let sectionIndex = 0;

    function addSection(type = 'content') {

        const wrapper = document.getElementById('sections-wrapper');
        if (!wrapper) return;

        const index = sectionIndex++;

        let html = '';

        if (type === 'heading') {
            html = `<input type="text" name="sections[${index}][value]" placeholder="Judul">`;
        }

        if (type === 'subheading') {
            html = `<input type="text" name="sections[${index}][value]" placeholder="Subjudul">`;
        }

        if (type === 'content') {
            html = `
            <div class="editor" data-name="sections[${index}][value]"></div>
            <input type="hidden" name="sections[${index}][value]">
        `;
        }

        const div = document.createElement('div');
        div.classList.add('section-item');

        div.innerHTML = `
        <input type="hidden" name="sections[${index}][type]" value="${type}">
        ${html}
        <button type="button" class="btn-remove">Hapus</button>
    `;

        wrapper.appendChild(div);

        initEditor();
    }

    window.addSection = addSection;

    // 🔥 WAJIB GLOBAL
    window.addSection = addSection;

    /*
    =========================
    🔥 GLOBAL CLICK (CLEAN)
    =========================
    */
    document.addEventListener("click", function (e) {

        // tombol tambah section
        if (e.target.dataset.type) {
            addSection(e.target.dataset.type);
        }

        // hapus section
        if (e.target.classList.contains("btn-remove")) {
            e.target.closest(".section-item").remove();
        }
    });

    /*
    =========================
    🔥 AUTO SAVE (FIX ARRAY)
    =========================
    */
    function autoSave() {

        const form = document.querySelector("#form-submateri");
        if (!form) return;

        form.oninput = function () {

            const data = new FormData(form);
            const obj = {};

            data.forEach((val, key) => {

                // 🔥 HANDLE ARRAY
                if (key.includes('sections')) {
                    obj[key] = val;
                } else {
                    obj[key] = val;
                }
            });

            localStorage.setItem("draft_submateri", JSON.stringify(obj));
        };
    }

    /*
    =========================
    🔥 LOAD DRAFT (FIXED)
    =========================
    */
    function loadDraft() {

        const data = localStorage.getItem("draft_submateri");
        if (!data) return;

        const obj = JSON.parse(data);

        Object.keys(obj).forEach(name => {

            const el = document.querySelector(`[name="${name}"]`);
            if (!el) return;

            if (el.type === "file") return;

            if (el.type === "checkbox") {
                el.checked = obj[name] == 1;
            } else {
                el.value = obj[name];
            }
        });
    }

    /*
    =========================
    🔥 BACK BUTTON
    =========================
    */
    window.addEventListener("popstate", function () {
        loadPage(location.search || "?page=dashboard", false);
    });

    /*
    =========================
    🔥 INIT
    =========================
    */
    initAll();
});
