document.getElementById('login-login').addEventListener("submit", ( event )=>{
    event.preventDefault(); 

    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    data['action'] = 'test';
    
    fetch('../backend/controller/sessions.php', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then( response => response.text() )
    .then( response => {
        if(response){
            alert("sesión iniciada")
            location.href="/src";
        }else{
            document.getElementById('spanLogin').classList.remove('hidden');
        }
    })
});
