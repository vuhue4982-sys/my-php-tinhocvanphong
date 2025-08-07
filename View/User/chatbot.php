<!-- Thêm chatbot vào cuối file, trước khi gọi footer -->
<?php if(isset($show_chatbot) && $show_chatbot): ?>
<div id="chatbot-wrapper">
    <button id="chatbot-toggle" class="chatbot-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 0 2 2z"></path>
        </svg>
        <span>Hỗ trợ</span>
    </button>
    
    <div id="chatbot-container">
        <!-- Thêm tham số về kích thước vào URL iframe -->
        <iframe src="index.php?controller=Chatbot&iframe=1" style="width:100%;height:100%;border:none;"></iframe>
    </div>
</div>

<style>
 

/* Nút hỗ trợ */
.chatbot-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #4CAF50;
    color: white;
    border: none;
    padding: 12px 16px;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 16px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.chatbot-btn:hover {
    background: #388E3C;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}

.chatbot-btn svg {
    width: 20px;
    height: 20px;
}

/* Khung chatbot */
#chatbot-container {
    position: fixed;
    bottom: 80px;
    right: 30px;
    width: 380px;
    height: 600px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    z-index: 9998;
    transition: all 0.3s ease;
    border: 1px solid #e1e1e1;
    background: white;
    transform: translateY(20px);
    opacity: 0;
    pointer-events: none;
}

#chatbot-container.visible {
    transform: translateY(0);
    opacity: 1;
    pointer-events: auto;
}
#chatbot-wrapper {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
}

#chatbot-container {
    position: fixed;
    bottom: 80px;
    right: 30px;
    width: 380px;
    height: 600px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    z-index: 9998;
    transition: all 0.3s ease;
    border: 1px solid #e1e1e1;
    background: white;
    transform: translateY(20px);
    opacity: 0;
    pointer-events: none;
}

#chatbot-container.visible {
    transform: translateY(0);
    opacity: 1;
    pointer-events: auto;
}

#chatbot-container iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('chatbot-toggle');
    const chatbot = document.getElementById('chatbot-container');
    let isChatbotOpen = false;

    // Lắng nghe message từ iframe
    window.addEventListener('message', function(event) {
        if (event.data === 'closeChatbot') {
            toggleChatbot();
        }
    });

    // Hàm đóng/mở chatbot
    function toggleChatbot() {
        isChatbotOpen = !isChatbotOpen;
        if (isChatbotOpen) {
            chatbot.classList.add('visible');
            // Reset iframe khi mở chatbot
            const iframe = chatbot.querySelector('iframe');
            iframe.src = iframe.src; // Refresh iframe
        } else {
            chatbot.classList.remove('visible');
        }
    }

    // Sự kiện click nút hỗ trợ
    toggleBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleChatbot();
    });

    // Đóng khi click ra ngoài
    document.addEventListener('click', function(e) {
        if (isChatbotOpen && !chatbot.contains(e.target) && e.target !== toggleBtn) {
            toggleChatbot();
        }
    });

    // Ngăn sự kiện click trong iframe
    chatbot.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});
</script>
<?php endif; ?>