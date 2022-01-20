
document.forms['myform1'].addEventListener('submit', (event) => {
    event.preventDefault();
    console.log(event);
    // TODO do something here to show user that form is being submitted
    fetch(event.target.action, {
        method: 'POST',
        body: new URLSearchParams(new FormData(event.target)) // event.target is the form
    }).then((resp) => {
        handleHttpStatusCodes(resp.status);
        return resp.text(); // or resp.text() or whatever the server sends
    }).then((data) => {
        // TODO handle body
        console.log(data)
    }).catch((error) => {
        // TODO handle error
       // alert("Achtung backend funktioniert nicht!");
    });
});

function handleHttpStatusCodes(code) {
    if (code === 400) {
        document.getElementById('myText').innerText = "Ein Fehler ist aufgetreten";
    } else if(code === 201) {
        document.getElementById('myText').innerText = "Eintrag angelegt";
    }
}
window.open("cart.php");