    <div class="chat-container">
        <div class="chat-box" id="chatBox">
            <div class="chat-header">
                <strong>Halo KN Salatiga</strong>
                <button class="btn-close" onclick="toggleChat()"></button>

            </div>
            <div class="chat-body" id="chatBody">
                <!-- Chat messages will appear here -->
                <div class="message receiver">
                    <div class="icon text-green">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div class="message-content">
                        Halo, silahkan pilih pelayanan yang ingin dilakukan: <br> <br>
                        <ol>
                            <li>Layanan PTSP</li>
                            <li>Pengambilan Tilang</li>
                            <li>Pengambilan / Pengantaran Barang Bukti Gratis</li>
                            <li>Pelayanan Hukum Gratis</li>
                            <li>Pertimbangan Hukum</li>
                            <li>Bantuan Hukum</li>
                            <li>Layanan Saksi</li>
                            <li>Jaksa Menyapa</li>
                            <li>Kunjungan Tahanan</li>
                            <li>Jaksa Masuk Sekolah</li>
                            <li>Permohonan Perpanjangan Penahanan</li>
                            <li>Penerangan Hukum</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="chat-input">
                <input type="text" id="chatInput" placeholder="Tulis Pesan..." class="form-control">
                <button class="btn btn-green" onclick="sendMessage()">Send</button>
            </div>
        </div>
        <button class="chat-toggle" onclick="toggleChat()">
            <img src="<?php echo base_url('assets/img') ?>/chat.png" alt="" width="250%">
        </button>
    </div>

<script>
function toggleChat() {
    const chatBox = document.getElementById('chatBox');
    const chatToggle = document.querySelector('.chat-toggle');
    chatBox.classList.toggle('show');
    chatToggle.style.display = chatBox.classList.contains('show') ? 'none' : 'flex';
}

function sendMessage() {
    const chatInput = document.getElementById('chatInput');
    const chatBody = document.querySelector('.chat-body');
    const message = chatInput.value.trim();

    if (message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', 'sender');
        messageElement.innerHTML = `
            <div class="message-content">${message}</div>
            <div class="icon text-green">
                <i class="fa-solid fa-user"></i>
            </div>
        `;
        chatBody.appendChild(messageElement);
        chatInput.value = '';
        chatBody.scrollTop = chatBody.scrollHeight;

        autoReply(message);
    }
}

function autoReply(userMessage) {
    let replyMessage = '';

    switch (userMessage) {
        case '1':
            replyMessage = 'Layanan PTSP merupakan ...';
            break;
        case '2':
            replyMessage = 'Pengambilan Tilang merupakan ...';
            break;
        case '3':
            replyMessage = 'Pengambilan / Pengantaran Barang Bukti Gratis merupakan ...';
            break;
        case '4':
            replyMessage = 'Pelayanan Hukum Gratis merupakan ...';
            break;
        case '5':
            replyMessage = 'Pertimbangan Hukum merupakan ...';
            break;
        case '6':
            replyMessage = 'Bantuan Hukum merupakan ...';
            break;
        case '7':
            replyMessage = 'Layanan Saksi merupakan ...';
            break;
        case '8':
            replyMessage = 'Jaksa Menyapa merupakan ...';
            break;
        case '9':
            replyMessage = 'Kunjungan Tahanan merupakan ...';
            break;
        case '10':
            replyMessage = 'Jaksa Masuk Sekolah merupakan ...';
            break;
        case '11':
            replyMessage = 'Permohonan Perpanjangan Penahanan merupakan ...';
            break;
        case '12':
            replyMessage = 'Penerangan Hukum merupakan ...';
            break;
        default:
            replyMessage = 'Silakan pilih nomor (1, 2, 3, 4, 5, dst.) sesuai pelayanan yang ingin ditanyakan.';
    }

    const replyElement = document.createElement('div');
    replyElement.classList.add('message', 'receiver');
    replyElement.innerHTML = `
        <div class="icon text-green">
            <i class="fa-solid fa-robot"></i>
        </div>
        <div class="message-content">${replyMessage}</div>
    `;
    const chatBody = document.getElementById('chatBody');
    chatBody.appendChild(replyElement);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Reset chat on page load
window.onload = function() {
    const chatBody = document.getElementById('chatBody');
    chatBody.innerHTML = '';
    chatBody.innerHTML = `
        <div class="message receiver">
            <div class="icon text-green">
                <i class="fa-solid fa-robot"></i>
            </div>
            <div class="message-content">
                Halo, silahkan pilih pelayanan yang ingin dilakukan: <br> <br>
                <ol>
                    <li>Layanan PTSP</li>
                    <li>Pengambilan Tilang</li>
                    <li>Pengambilan / Pengantaran Barang Bukti Gratis</li>
                    <li>Pelayanan Hukum Gratis</li>
                    <li>Pertimbangan Hukum</li>
                    <li>Bantuan Hukum</li>
                    <li>Layanan Saksi</li>
                    <li>Jaksa Menyapa</li>
                    <li>Kunjungan Tahanan</li>
                    <li>Jaksa Masuk Sekolah</li>
                    <li>Permohonan Perpanjangan Penahanan</li>
                    <li>Penerangan Hukum</li>
                </ol>
            </div>
        </div>
    `;
};
</script>