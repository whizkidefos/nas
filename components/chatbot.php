<div id="chatbot-icon" style="cursor:pointer;">
    <i class="fa-solid fa-comments"></i>
</div>

<div id="chatbot-container" style="display: none;">
    <div id="chatbox-header">
        <span id="chatbox-title">Chat with Us</span>
        <span id="close-chatbox" style="cursor:pointer;">
            <i class="fa-solid fa-xmark"></i>
        </span>
    </div>
    <div id="default-questions">
        <p>Click on a question to ask:</p>
        <button class="default-question" data-question="What is the association's history?">What is the association's history?</button>
        <button class="default-question" data-question="How can I join the association?">How can I join the association?</button>
        <button class="default-question" data-question="What events are upcoming?">What events are upcoming?</button>
        <button class="default-question" data-question="Who are the board members?">Who are the board members?</button>
    </div>
    <div class="input-response-box">
        <input type="text" id="user-input" class="chatbot-question" placeholder="Ask me anything...">
        <button id="send-btn" class="">Send</button>
        <div id="chatbot-response"></div>
    </div>
</div>