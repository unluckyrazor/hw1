function validation(event)
{
    // se i campi non sono riempiti
     if((form.username.value.length == 0 ||              
       form.password.value.length == 0))
    { 
       if(tries==0) {
        const desc = document.createElement("div");
        desc.style.textAlign='center';
        desc.textContent="non hai messo i campi";
       
        const login_form = document.querySelector(".form");
        login_form.appendChild(desc);

        tries=1;
       }
        
        
        event.preventDefault();
    }
        
}

let tries=0;
const form = document.forms['login_form'];
form.addEventListener('submit', validation);