<button id="openChatBtn" onclick="toggleChat()" class="chat-toggle-btn">
    <i class='bx bx-message-rounded-dots'></i>
</button>
<div class="container-chat" id="dragItem">
    <main class="main-chat">
        <div class="chat-close">
            <h5>Admin Chat</h5>
            <button onclick="closeChat()" style="background:none;border:none;font-size:18px;cursor:pointer;"><i
                    class='bx bx-x'></i></button>
        </div>
        <div class="wrapper-chat">
            <div class="box-chat" id="chatBox"></div>
            <div class="box-replying" id="replyBox" style="display:none;">
                <div>
                    <div>
                        <h6 id="replyName"></h6>
                        <h5 id="replyText"></h5>
                    </div>
                    <button onclick="cancelReply()">batal</button>
                </div>
            </div>
            <div class="box-chat-input">
                <div class="chat-admin-input">
                    <input type="text" id="message" placeholder="Ketik pesan...">
                </div>
                <div>
                    <i class='bx bxs-send' onclick="sendMessage()"></i>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const chat = document.getElementById('dragItem');
        const btn = document.getElementById('openChatBtn');

        chat.style.display = 'none'; // pastikan hidden
        btn.style.display = 'flex'; // tombol muncul
    });
</script>
<script>
    // =====================
    // ANTI DOUBLE BUTTON
    // =====================
    document.querySelectorAll("#openChatBtn").forEach((btn, i) => {
        if (i > 0) btn.remove();
    });

    // =====================
    // OPEN / CLOSE CHAT
    // =====================

    function toggleChat() {
        const chat = document.getElementById('dragItem');
        const btn = document.getElementById('openChatBtn');

        if (!chat.classList.contains('show')) {

            chat.style.display = 'flex';

            // aktifkan animasi
            chat.classList.add('animating');

            setTimeout(() => {
                chat.classList.add('show');
            }, 10);

            // ❗ matikan transition setelah animasi selesai
            setTimeout(() => {
                chat.classList.remove('animating');
            }, 300);

            btn.style.display = 'none';

        } else {
            closeChat();
        }
    }

    function closeChat() {
        const chat = document.getElementById('dragItem');
        const btn = document.getElementById('openChatBtn');

        // aktifkan animasi
        chat.classList.add('animating');

        chat.classList.remove('show');

        setTimeout(() => {
            chat.style.display = 'none';

            // matikan transition lagi
            chat.classList.remove('animating');

        }, 300);

        btn.style.display = 'flex';
    }

    // =====================
    // DRAG SYSTEM
    // =====================
    const dragItem = document.getElementById("dragItem");

    let isDragging = false;
    let offsetX = 0;
    let offsetY = 0;

    let currentX = 0;
    let currentY = 0;

    const margin = 13;


    dragItem.addEventListener("mousedown", (e) => {
        if (e.button !== 0) return; // hanya klik kiri
        if (e.target.closest('.chat-input')) return; // jangan drag saat klik input

        isDragging = true;

        const rect = dragItem.getBoundingClientRect();

        offsetX = e.clientX - rect.left;
        offsetY = e.clientY - rect.top;

        dragItem.style.cursor = "grabbing";
    });

    document.addEventListener("mousemove", (e) => {
        if (!isDragging) return;

        requestAnimationFrame(() => {

            let newX = e.clientX - offsetX;
            let newY = e.clientY - offsetY;

            const maxX = window.innerWidth - dragItem.offsetWidth - margin;
            const maxY = window.innerHeight - dragItem.offsetHeight - margin;

            if (newX < margin) newX = margin;
            if (newY < margin) newY = margin;
            if (newX > maxX) newX = maxX;
            if (newY > maxY) newY = maxY;

            currentX = newX;
            currentY = newY;

            dragItem.style.transform = `translate(${currentX}px, ${currentY}px)`;
        });
    });

    document.addEventListener("mouseup", () => {
        isDragging = false;
        dragItem.style.cursor = "grab";
        document.body.style.userSelect = "auto";
    });
</script>
{{-- ====================================================== --}}
<script>
    const myId = {{ auth()->id() }};
    let replyData = null;
    let isUserAtBottom = true;

    const chatBox = document.getElementById('chatBox');

    // =====================
    // DETEKSI SCROLL USER
    // =====================
    chatBox.addEventListener('scroll', () => {
        const threshold = 100;

        isUserAtBottom =
            chatBox.scrollTop + chatBox.clientHeight >=
            chatBox.scrollHeight - threshold;
    });

    // =====================
    // LOAD CHAT
    // =====================
    function loadChat() {
        fetch('/chat')
            .then(res => res.json())
            .then(data => {

                let html = '';

                data.forEach(chat => {

                    let isMe = chat.sender_id == myId;
                    let className = isMe ? 'main-message me' : 'main-message other';

                    html += `
            <section class="${className}">
                <div class="wrapper-message">

                    ${chat.reply ? `
                    <div class="box-reply">
                        <div>
                            <h6>reply : ${chat.reply.sender.name}</h6>
                            <h5>${chat.reply.message}</h5>
                        </div>
                    </div>` : ''}

                    <div class="box-message">
                        <div class="profile-chat">
                            <h6>${chat.sender.name}</h6>
                        </div>
                        <div class="desc-chat">
                            <div>
                                <h5>${chat.message}</h5>
                            </div>
                            <div class="time-chat">
                                <h6>${chat.created_at}</h6>
                            </div>
                        </div>
                    </div>

                </div>

                ${!isMe ? `
                <div class="btn-reply"
                    onclick="setReply(${chat.id}, '${chat.sender.name}', \`${chat.message}\`)">
                    <i class='bx bx-reply'></i>
                </div>` : ''}

            </section>
            `;
                });

                // simpan tinggi lama
                const prevScrollHeight = chatBox.scrollHeight;

                // render ulang
                chatBox.innerHTML = html;

                // =====================
                // AUTO SCROLL LOGIC
                // =====================
                if (isUserAtBottom) {
                    // kalau user di bawah → ikut turun
                    chatBox.scrollTop = chatBox.scrollHeight;
                } else {
                    // kalau user lagi baca atas → jangan ganggu
                    chatBox.scrollTop = chatBox.scrollTop;
                }

            })
            .catch(err => console.error('LOAD ERROR:', err));
    }

    setInterval(loadChat, 2000);
    loadChat();

    // =====================
    // SET REPLY
    // =====================
    function setReply(id, name, message) {
        replyData = {
            id: id
        };

        document.getElementById('replyBox').style.display = 'block';
        document.getElementById('replyName').innerText = 'reply : ' + name;
        document.getElementById('replyText').innerText = message;
    }

    // =====================
    // CANCEL REPLY
    // =====================
    function cancelReply() {
        replyData = null;

        document.getElementById('replyName').innerText = '';
        document.getElementById('replyText').innerText = '';
        document.getElementById('replyBox').style.display = 'none';
    }

    // =====================
    // SEND MESSAGE (TIDAK DIUBAH)
    // =====================
    function sendMessage() {

        let input = document.getElementById('message');
        let message = input.value.trim();

        if (message === '') return;

        fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message: message,
                    reply_id: replyData ? replyData.id : null
                })
            })
            .then(res => res.json())
            .then(() => {

                input.value = '';
                replyData = null;

                document.getElementById('replyBox').style.display = 'none';

                loadChat();
            })
            .catch(err => console.error('SEND ERROR:', err));
    }
</script>
