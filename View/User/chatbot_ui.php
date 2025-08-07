<?php
$isIframe = isset($_GET['iframe']) && $_GET['iframe'] == 1;
?>
<div class="chatbot-container" id="chatbot-container">
    <div class="chatbot-header">
        <div class="header-content">
            <!-- <div class="avatar">🤖</div> -->
            <div class="header-text">
                <h3>Trợ Lý Tin Học Văn Phòng</h3>
                <p>Hỏi tôi bất cứ điều gì về Word, Excel, PowerPoint</p>
            </div>
        </div>
        <button class="close-chatbot">&times;</button>
    </div>
    <div class="chatbot-messages" id="chatbot-messages">
        <div class="bot-message welcome-message">
            <strong>Xin chào! Tôi có thể giúp gì cho bạn?</strong><br>
            Bạn có thể hỏi về:
            <ul>
                <li>Các thao tác trong Word, Excel, PowerPoint</li>
                <li>Cách sử dụng các hàm trong Excel</li>
                <li>Cách tạo hiệu ứng trong PowerPoint</li>
                <li>Các phím tắt thông dụng</li>
            </ul>
            <div class="quick-questions">
                <span>Hoặc thử hỏi nhanh:</span>
                <button class="quick-question">Cách căn lề trong Word</button>
                <button class="quick-question">Hàm VLOOKUP trong Excel</button>
                <button class="quick-question">Thêm hiệu ứng PowerPoint</button>
            </div>
        </div>
    </div>
    <div class="chatbot-input">
        <button id="voice-button" class="voice-btn" title="Nhấn để nói">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                <line x1="12" y1="19" x2="12" y2="23"></line>
                <line x1="8" y1="23" x2="16" y2="23"></line>
            </svg>
        </button>
        <input type="text" id="user-question" placeholder="Nhập câu hỏi của bạn...">
        <button id="send-question" class="send-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
        </button>
    </div>
    <div class="chatbot-status" id="recording-status">
        <div class="pulse-animation"></div>
        <span>Đang nghe...</span>
    </div>
</div>

<style>
:root {
    --primary-color: #4CAF50;
    --primary-dark: #388E3C;
    --primary-light: #C8E6C9;
    --text-color: #333;
    --light-text: #777;
    --border-color: #e1e1e1;
    --bot-bubble: #f1f1f1;
    --user-bubble: var(--primary-color);
    --error-color: #f44336;
}

.chatbot-container {
    position: fixed;
    bottom: 10px;
    /* right: 20px; */
    width: 380px;
    height: 600px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    background: white;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.3s ease;
}

.chatbot-container.visible {
    transform: translateY(0);
    opacity: 1;
}

.chatbot-header {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.avatar {
    font-size: 24px;
    width: 40px;
    height: 40px;
    background: white;
    color: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.header-text h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.header-text p {
    margin: 3px 0 0;
    font-size: 12px;
    opacity: 0.9;
}

.close-chatbot {
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.close-chatbot:hover {
    background: rgba(255,255,255,0.3);
}

.chatbot-messages {
    flex-grow: 1;
    padding: 15px;
    overflow-y: auto;
    background: #f9f9f9;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.bot-message, .user-message {
    margin-bottom: 0;
    padding: 12px 16px;
    border-radius: 18px;
    max-width: 85%;
    line-height: 1.5;
    font-size: 14px;
    position: relative;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.bot-message {
    background: white;
    border: 1px solid var(--border-color);
    border-bottom-left-radius: 5px;
    margin-right: auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.user-message {
    background: var(--user-bubble);
    color: white;
    border-bottom-right-radius: 5px;
    margin-left: auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.welcome-message {
    background: var(--primary-light);
    border-color: var(--primary-light);
    color: var(--text-color);
}

.lesson-item {
    padding: 10px;
    margin: 8px 0;
    background: var(--primary-light);
    border-radius: 8px;
    border-left: 3px solid var(--primary-color);
}

.lesson-item a {
    color: var(--primary-dark);
    text-decoration: none;
    font-weight: 500;
    display: block;
}

.lesson-item a:hover {
    text-decoration: underline;
}

.quick-questions {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.quick-questions span {
    font-size: 13px;
    color: var(--light-text);
}

.quick-question {
    background: rgba(255,255,255,0.8);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 6px 12px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
    text-align: left;
    color: var(--text-color);
}

.quick-question:hover {
    background: white;
    border-color: var(--primary-color);
    color: var(--primary-dark);
}

.chatbot-input {
    display: flex;
    padding: 12px;
    border-top: 1px solid var(--border-color);
    background: white;
    align-items: center;
    gap: 8px;
}

#user-question {
    flex-grow: 1;
    padding: 10px 15px;
    border: 1px solid var(--border-color);
    border-radius: 20px;
    outline: none;
    font-size: 14px;
    transition: all 0.2s;
}

#user-question:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
}

.voice-btn, .send-btn {
    background: none;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    color: var(--primary-color);
}

.voice-btn:hover, .send-btn:hover {
    background: var(--primary-light);
}

.voice-btn.recording {
    background: var(--error-color);
    color: white;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(244, 67, 54, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(244, 67, 54, 0); }
    100% { box-shadow: 0 0 0 0 rgba(244, 67, 54, 0); }
}

.send-btn {
    background: var(--primary-color);
    color: white;
}

.send-btn:hover {
    background: var(--primary-dark);
}

.chatbot-status {
    position: absolute;
    bottom: 70px;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 8px 15px;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.3s ease;
}

.chatbot-status.visible {
    transform: translateY(0);
    opacity: 1;
}

.pulse-animation {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--error-color);
    animation: soundWave 1.5s infinite ease-out;
}

@keyframes soundWave {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.5); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}

/* Scrollbar styling */
.chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Typing indicator */
.typing-indicator {
    display: inline-flex;
    gap: 4px;
    align-items: center;
}

.typing-dot {
    width: 8px;
    height: 8px;
    background: #aaa;
    border-radius: 50%;
    display: inline-block;
    animation: typingAnimation 1.4s infinite ease-in-out;
}

.typing-dot:nth-child(1) { animation-delay: 0s; }
.typing-dot:nth-child(2) { animation-delay: 0.2s; }
.typing-dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes typingAnimation {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-5px); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const messagesDiv = document.getElementById('chatbot-messages');
    const userInput = document.getElementById('user-question');
    const sendBtn = document.getElementById('send-question');
    const voiceBtn = document.getElementById('voice-button');
    const closeBtn = document.querySelector('.close-chatbot');
    const recordingStatus = document.getElementById('recording-status');
    const chatbotContainer = document.getElementById('chatbot-container');
    
      <?php if($isIframe): ?>
    // Tự động điều chỉnh chiều cao nếu trong iframe
    function adjustHeight() {
        const container = document.documentElement;
        const height = container.scrollHeight;
        window.parent.postMessage({
            type: 'chatbotHeight',
            height: height
        }, '*');
    }

    // Gọi lần đầu và khi nội dung thay đổi
    adjustHeight();
    new MutationObserver(adjustHeight).observe(
        document.getElementById('chatbot-messages'),
        { childList: true, subtree: true }
    );
    <?php endif; ?>
    
    // Hiển thị chatbot với hiệu ứng
    setTimeout(() => {
        chatbotContainer.classList.add('visible');
    }, 100);
    
    // Speech recognition setup
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    let recognition;
    let isRecording = false;
    
    if (SpeechRecognition) {
        recognition = new SpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'vi-VN'; // Vietnamese language
        
        recognition.onstart = function() {
            isRecording = true;
            voiceBtn.classList.add('recording');
            recordingStatus.classList.add('visible');
        };
        
        recognition.onend = function() {
            isRecording = false;
            voiceBtn.classList.remove('recording');
            recordingStatus.classList.remove('visible');
        };
        
        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            userInput.value = transcript;
            sendQuestion();
        };
        
        recognition.onerror = function(event) {
            console.error('Speech recognition error', event.error);
            addMessage('Xin lỗi, tôi không nghe rõ. Bạn có thể thử lại hoặc nhập bằng tay.', false);
            voiceBtn.classList.remove('recording');
            recordingStatus.classList.remove('visible');
        };
    } else {
        voiceBtn.style.display = 'none';
        console.warn('Speech recognition not supported in this browser');
    }
    
    // Cuộn xuống dưới cùng khi có tin nhắn mới
    function scrollToBottom() {
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
    
    // Thêm tin nhắn vào khung chat
    function addMessage(message, isUser = false) {
        const messageClass = isUser ? 'user-message' : 'bot-message';
        const messageElement = document.createElement('div');
        messageElement.className = messageClass;
        messageElement.innerHTML = message;
        
        // Thêm hiệu ứng xuất hiện
        messageElement.style.opacity = '0';
        messageElement.style.transform = 'translateY(10px)';
        
        messagesDiv.appendChild(messageElement);
        
        // Kích hoạt hiệu ứng
        setTimeout(() => {
            messageElement.style.opacity = '1';
            messageElement.style.transform = 'translateY(0)';
            scrollToBottom();
        }, 10);
    }
    
    // Hiển thị indicator khi bot đang "đánh máy"
    function showTypingIndicator() {
        const typingElement = document.createElement('div');
        typingElement.className = 'bot-message';
        typingElement.innerHTML = '<div class="typing-indicator"><span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span></div>';
        messagesDiv.appendChild(typingElement);
        scrollToBottom();
        return typingElement;
    }
    
    // Ẩn indicator khi bot đã "đánh máy" xong
    function hideTypingIndicator(typingElement) {
        typingElement.remove();
    }
    
    // Xử lý khi gửi câu hỏi
    function sendQuestion() {
        const question = userInput.value.trim();
        if(question === '') return;
        
        addMessage(question, true);
        userInput.value = '';
        
        // Hiển thị indicator đang xử lý
        const typingElement = showTypingIndicator();
        
        // Gửi câu hỏi đến server
        fetch('index.php?controller=Chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `question=${encodeURIComponent(question)}`
        })
        .then(response => response.json())
        .then(data => {
            // Ẩn indicator
            hideTypingIndicator(typingElement);
            
            if(data.type === 'answer') {
                addMessage(`<strong>${data.category.toUpperCase()}:</strong><br>${data.content}`);
            } 
            else if(data.type === 'lessons') {
                let message = '<strong>Tôi tìm thấy các bài học liên quan:</strong><br>';
                data.content.forEach(lesson => {
                    message += `<div class="lesson-item">
                              <a href="${lesson.link}" target="_blank">${lesson.title}</a>
                              </div>`;
                });
                addMessage(message);
            }
            else {
                addMessage(data.content);
            }
        })
        .catch(error => {
            hideTypingIndicator(typingElement);
            addMessage('Xin lỗi, có lỗi xảy ra khi kết nối với máy chủ. Vui lòng thử lại sau.', false);
            console.error('Error:', error);
        });
    }
    
    // Sự kiện click nút gửi
    sendBtn.addEventListener('click', sendQuestion);
    
    // Sự kiện nhấn Enter
    userInput.addEventListener('keypress', function(e) {
        if(e.key === 'Enter') sendQuestion();
    });
    
    // Sự kiện nút giọng nói
    voiceBtn.addEventListener('click', function() {
        if (!SpeechRecognition) {
            addMessage('Trình duyệt của bạn không hỗ trợ nhận diện giọng nói. Vui lòng nâng cấp trình duyệt.', false);
            return;
        }
        
        if (isRecording) {
            recognition.stop();
        } else {
            try {
                recognition.start();
            } catch (error) {
                console.error('Recognition error:', error);
                addMessage('Không thể khởi động nhận diện giọng nói. Vui lòng kiểm tra microphone.', false);
            }
        }
    });
    
    // Sự kiện đóng chatbot
    closeBtn.addEventListener('click', function() {
        // Gửi message đến parent window để đóng iframe
        if (window.parent) {
            window.parent.postMessage('closeChatbot', '*');
        }
        chatbotContainer.classList.remove('visible');
        setTimeout(() => {
            chatbotContainer.style.display = 'none';
        }, 300);
    });
    
    // Sự kiện click vào câu hỏi nhanh
    document.querySelectorAll('.quick-question').forEach(button => {
        button.addEventListener('click', function() {
            userInput.value = this.textContent;
            sendQuestion();
        });
    });
});
</script>