
window.onload=function(){
    button.onclick=function() {
        var name = document.getElementById("Search").value;
        // Setting
        var Info;
        sessionStorage.name = name;
        jQuery.ajax({
            type: "POST",
            url: 'interface.php',
            datatype: 'json',
            data: {functionname: 'search_cv', arguments: sessionStorage.name},
            success: function (data) {
                console.log(data);
                Info = JSON.parse(data);
                console.log(Info);
                var i, x = "";
                var p = document.createElement("div");
                for (i in Info) {

                  //  var link="CV.html?username="+encodeURIComponent(Info[i].username);
                    x += Info[i].username + " " + Info[i].name + "<a href='CV.php?username="+Info[i].username+"'><input type='button' value='show more'></a><br>";
                    //x += Info[i].username + " " + Info[i].name +"<a href='CV.html' onclick='location.href=this.href'+?username=+Info[i].username'>Show</a>"
                   //$('a').attr('href',link);
                }

                p.innerHTML = x;
                document.getElementById("main").appendChild(p);
                //alert(name);
            }

        });
    }
}
