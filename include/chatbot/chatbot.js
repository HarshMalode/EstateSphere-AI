function openChat(){

document.getElementById("chatWindow").style.display="block";

}



function closeChat(){

document.getElementById("chatWindow").style.display="none";

}




function sendQuick(text){

document.getElementById("userInput").value=text;

sendMessage();

}





function sendMessage(){


let input=document.getElementById("userInput");

let message=input.value.trim();



if(message==="") return;



let chat=document.getElementById("chatBody");



chat.innerHTML += `

<div class="user-message">

${message}

</div>

`;



fetch("include/chatbot/chatbot_api.php",{

method:"POST",

headers:{

"Content-Type":"application/x-www-form-urlencoded"

},

body:"message="+encodeURIComponent(message)

})


.then(response=>response.text())


.then(data=>{


console.log(data);



try{


let jsonData=JSON.parse(data);



if(jsonData.type==="property"){


let cards="";



jsonData.data.forEach(property=>{


cards += `

<div class="property-card">


<img 
src="images/${property.image}" 
onerror="this.src='images/no-image.jpg'"
>



<h4>

${property.title}

</h4>



<p>

📍 ${property.city}

</p>



<p>

💰 ${property.price}

</p>



<button onclick="openProperty(${property.pid})">

View Details

</button>


</div>


`;

});





chat.innerHTML += `

<div class="bot-message property-result">

${cards}

</div>

`;



}



else{


chat.innerHTML += `

<div class="bot-message">

${data}

</div>

`;

}


}



catch(e){



chat.innerHTML += `

<div class="bot-message">

${data}

</div>

`;



}



chat.scrollTop=chat.scrollHeight;



})


.catch(error=>{


chat.innerHTML +=`

<div class="bot-message">

Server error. Please try again.

</div>

`;


console.log(error);


});



input.value="";


}





// Open property detail page

function openProperty(id){


window.location.href="propertydetail.php?pid="+id;


}




// Press Enter to send message

document.getElementById("userInput")
.addEventListener("keypress",function(e){


if(e.key==="Enter"){

sendMessage();

}


});