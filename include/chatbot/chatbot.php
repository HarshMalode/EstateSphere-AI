<div class="chatbot-container">


<!-- Floating Button -->

<button class="chatbot-toggle" onclick="openChat()">

🤖

</button>



<!-- Chat Window -->

<div class="chat-window" id="chatWindow">


<div class="chat-header">

<div>

<h3>🏠 Real Estate Assistant</h3>

<p>Your Smart Property Guide</p>

</div>


<span onclick="closeChat()">✕</span>


</div>





<div class="chat-body" id="chatBody">


<div class="bot-message">

👋 Hello! I'm your Real Estate Assistant.

<br><br>

I can help you with:

<br>
• Buy Property
<br>
• Sell Property
<br>
• EMI Calculation
<br>
• Flats, Villas & Apartments
<br>
• International Properties
<br>
• Property Listing

<br><br>

How can I help you today?

</div>


</div>





<div class="quick-buttons">


<button onclick="sendQuick('Buy Property')">
Buy Property
</button>


<button onclick="sendQuick('Sell Property')">
Sell Property
</button>


<button onclick="sendQuick('EMI Calculator')">
EMI Calculator
</button>


<button onclick="sendQuick('Locations')">
Locations
</button>


</div>





<div class="chat-input">


<input 
id="userInput"
placeholder="Type your message..."
>


<button onclick="sendMessage()">

➤

</button>


</div>



<div class="powered">

Powered by <span>Real Estate Assistant</span>

</div>


</div>


</div>