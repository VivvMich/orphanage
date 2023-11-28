
const submit = document.getElementById('submit');
const message = document.getElementById('message');
const tutor = document.getElementById('tutor');

if ( submit != null) {
    submit.addEventListener('submit', function(e) {
        // Empèche le comportement par defaut du bouton
        // du formulaire c'est a dire le chargement vers une autre page.
        e.preventDefault();
    
        //nous allons injecter les données du formulaire dans un objet js appeler
        // formData
    
        // pour récupérer les valeur du formumlaire nous utilisons l'evenement
        // e.target
    
        const formData = new FormData(e.target);
    
        console.log(formData);
        
        data = {
            method: "POST",
            body: formData,
            headers: {
                "Accept": "application/json"
            }
        }
        
    
        fetch("controller/ajax.php", data)
        .then(response => response.json())
        .then(responseData => {
            console.log(responseData.message);
    
            // MESSAGE
            message.classList.remove("failed");
            message.classList.remove("success");
            void message.offsetWidth; 
            message.classList.add(responseData.status);
            message.innerHTML = responseData.message;
    
            // MODIFICATION DU NOM
    
            if (typeof(responseData.tutor) != "undefined"){
                tutor.innerHTML = responseData.tutor;
            }
            
        
        })
        
    
    
    })
}


/// bouton delete

const deleteBtn = document.getElementById('delete');
const bombs = document.querySelectorAll('.bomb');

for (link of bombs) {
    link.addEventListener('click', function() {
        let href = this.dataset.link
        deleteBtn.href = href;
    })
}

