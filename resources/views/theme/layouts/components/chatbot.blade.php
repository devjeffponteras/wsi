<!-- Chatbot Icon
============================================= -->
<div id="chatBotIcon" style="position: fixed; bottom: 100px; right: 25px; width: 50px; height: 50px; background-color: #dd3451; border: none; border-radius: 50%; color: white; font-size: 24px; cursor: pointer; z-index: 2000; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); display: flex; align-items: center; justify-content: center; user-select: none;">
	💬
</div>

<!-- Chatbot Widget
============================================= -->
<div id="chatBot" style="position: fixed; bottom: 80px; right: 20px; width: 320px; height: 450px; background: linear-gradient(135deg, #f0f4f8, #ffffff); border: 2px solid #f5a9bc; z-index: 2000; cursor: default; padding: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.3); border-radius: 15px; display: none; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
	<div id="chatBotHeader" style="background-color: #dd3451; color: white; padding: 12px; border-top-left-radius: 12px; border-top-right-radius: 12px; user-select: none; font-weight: bold; display: flex; align-items: center; justify-content: space-between; font-size: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
		<span style="display: flex; align-items: center;">💬 Chat with Us</span>
		<button id="closeChatBot" style="background: none; border: none; color: white; font-size: 18px; cursor: pointer; padding: 0 5px; line-height: 1;">×</button>
	</div>
	<div id="chatBotContent" style="height: calc(100% - 90px); overflow-y: auto; background-color: #ffffff; padding: 15px; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; margin-bottom: 10px;">
		<p style="margin: 8px 0; color: #444; font-size: 14px;">Welcome to our chat! How can we assist you today?</p>
	</div>
	<div style="padding: 5px; display: flex; gap: 10px;">
		<input type="text" id="chatInput" style="flex: 1; padding: 8px; border: 1px solid #f5a9bc; border-radius: 6px; box-sizing: border-box; font-size: 14px; transition: border-color 0.3s;" placeholder="Type your message...">
		<button id="sendButton" style="background-color: #dd3451; color: white; border: none; padding: 8px 15px; cursor: pointer; border-radius: 6px; font-size: 14px; transition: background-color 0.3s;">Send</button>
	</div>
</div>
