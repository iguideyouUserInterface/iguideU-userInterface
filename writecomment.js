window.onload = function () {
    var links = document.getElementsByTagName('a'),
    length = links.length;

    for ( var i = 0; i < length; i ++) {
        
        if (links[i].className === "commentform") {
            links[i].onclick = function (event) {
                event.preventDefault();
              
                var id = this.id.match(/[0-9]+/);
                var writeLink = 'shownewcomment'+id;

                document.getElementById(writeLink).style.display=('block');

                return false;
            }
        }
    }
    var inputs = document.getElementsByTagName("a"),
    length = inputs.length;

    for(var i = 0; i < length; i++) {

        if(inputs[i].className == "showcomment") {
            inputs[i].onclick = function (event) {
                event.preventDefault();

                    getComments();
                    extendCollapse();
            }
        }
    }//ends for loop
}//close function