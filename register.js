function validation(event){



    //elementi per visualizzare errori 

    const desc = document.createElement("div");
    desc.style.textAlign='center';
    const register_form = document.querySelector(".form");
    register_form.appendChild(desc);         
    //previeni il submit del form 
    //event.preventDefault();

    function onJson(json){
        
        //se username o email già esistono nel DB esce dalla funzione e mostra l'errore
        if (json.username_exists){
            desc.textContent="nome utente già in uso";
            console.log(json);
            return;
            
            
        }
        else if(json.email_exists){
            desc.textContent="email già in uso";            
            console.log(json);
            return;
        }

        console.log(json);
        event.target.submit();
    
    
    }
    function onResponse(response){
        return response.json();
    }
                  
    //controllo se i campi sono inseriti(e se è il primo tentativo), se non lo sono non submitta
    if(form.username.value.length == 0 ||              
        form.password.value.length == 0 || 
        form.email.value.length == 0) {

            if(tries==0) {
                

                desc.textContent="non hai messo uno dei campi";
                
                
                tries=1;
            }
            event.preventDefault();
        }
        else {
            
            
            
            // controllo che la pw rispetti i parametri se non lo fa non submitta
            const password=form.password.value;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        
            if(!passwordRegex.test(password)){

                event.preventDefault();
                desc.textContent="La password deve essere almeno 8 caratteri e includere un numero , una maiuscola e un carattere speciale";
                return;

            }
            
                
            const username = form.username.value;
            const email = form.email.value;
            //mando al server username ed email per verificare se sono presi, server mi ritorna
            //json con booleani e chiamo onJson per gestire


            const formdata = new FormData();
            formdata.append("username", username);
            formdata.append("email", email);
            console.log(email + username)

            fetch('check_username_email.php', {
                method: 'POST',
                
                body: formdata
                
            }).then(onResponse).then(onJson);
        




        }

    



    
}



let tries=0;

//prendo il form dal DOM e ascolto. quando utente submitta entro in validation
const form = document.forms['register_form'];
form.addEventListener('submit', validation);