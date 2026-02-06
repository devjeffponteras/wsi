

		document.addEventListener('DOMContentLoaded', function () {
			const banner = document.getElementById('privacyBanner');
			const agreeButton = document.getElementById('agreeButton');
			let hasAgreed = localStorage.getItem('privacyBannerAgreed') === 'true';

			if (!hasAgreed) {
				banner.style.display = 'block'; // Show on first visit
			}

			// Hide permanently on agree
			agreeButton.addEventListener('click', function () {
				banner.style.bottom = '-100px';
				localStorage.setItem('privacyBannerAgreed', 'true');
				setTimeout(() => banner.style.display = 'none', 300); // Match transition duration
			});

			// Chatbot functionality
			const chatBotIcon = document.getElementById('chatBotIcon');
			const chatBot = document.getElementById('chatBot');
			const closeChatBot = document.getElementById('closeChatBot');
			const chatInput = document.getElementById('chatInput');
			const sendButton = document.getElementById('sendButton');

			// Toggle Chatbot on Icon Click
			chatBotIcon.addEventListener('click', function (e) {
				e.stopPropagation(); // Prevent drag interference
				chatBot.style.display = chatBot.style.display === 'none' ? 'block' : 'none';
			});

			// Close Chatbot with X button
			closeChatBot.addEventListener('click', function (e) {
				e.stopPropagation(); // Prevent drag interference
				chatBot.style.display = 'none';
			});

			// Basic send functionality
			sendButton.addEventListener('click', function () {
				const message = chatInput.value.trim();
				if (message) {
					const p = document.createElement('p');
					p.style.margin = '8px 0';
					p.style.color = '#444';
					p.style.fontSize = '14px';
					p.textContent = 'You: ' + message;
					chatBotContent.appendChild(p);
					chatInput.value = '';
					chatBotContent.scrollTop = chatBotContent.scrollHeight;
					// Simulate bot response
					setTimeout(() => {
						const response = document.createElement('p');
						response.style.margin = '8px 0';
						response.style.color = '#0066cc';
						response.style.fontSize = '14px';
						response.textContent = 'Bot: Thank you for your message! How else can I help?';
						chatBotContent.appendChild(response);
						chatBotContent.scrollTop = chatBotContent.scrollHeight;
					}, 500);
				}
			});

			chatInput.addEventListener('keypress', function (e) {
				if (e.key === 'Enter') sendButton.click();
			});
		});
