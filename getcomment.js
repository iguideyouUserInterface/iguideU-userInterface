function getComments () {

    var inputs = document.getElementsByTagName("a"),
    length = inputs.length;

    for(var i = 0; i < length; i++) {

        if(inputs[i].className == "showcomment") {
            inputs[i].onclick = function (event) {
               
                event.preventDefault();
                var id = this.id.slice(13);


                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
               
                xmlhttp.open("GET","getcomment.php?showcomment="+id, true);
                xmlhttp.send();


                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        var commentsContainer = document.getElementById("comments"+id);
                        
                        commentsContainer.innerHTML = xmlhttp.responseText;
                        
                    }
                }

            }
        }
        
    }

}