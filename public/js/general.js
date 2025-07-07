
export function closeSession(){
    const data = {"action": "closeSession"}
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
            alert("sesión cerrada")
            location.reload() //href="index.php";
        }
    })
}