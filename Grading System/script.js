
function closeCard(){
    document.getElementById("overlay").style.display="none";
    document.getElementById("cardDetails").style.display="none";

}

setTimeout(() => { 
$showMessage = document.getElementById('message');
if($showMessage){
    $showMessage.style.display="none";
}

}, 3000);