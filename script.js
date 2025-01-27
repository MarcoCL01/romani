
const buttone = document.getElementById('inviaex');
const textarea = document.getElementById('textex');

buttone.addEventListener('click', function()
{
    const text = textarea.value;
    if (text.trim() !== "") 
    {
        alert(`HAI SCRITTO : ${text}`);
    } 
    else 
    {
        alert("L'AREA DI TESTO E' VUOTA. PER FAVORE, PER INVIARE SCRIVI QUALCOSA.");
    }
});