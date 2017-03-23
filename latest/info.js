window.onload=function(){
  var i,j,x="",y="";
  /*var Info=
   {
   "name":"Siddharth",
   "branch":"C.S",
   "highlight":"Web Developer at S.U tech-team",
   "Ph":7997083778,
   "email":"f2016122@hyderabad.bits-pilani.ac.in",
   "official":[
   {"name":"DOSM","position":"member","experience":["Brought in-kind sponsorship in ATMOS","Convinced Vasan Eye care for free eye check-up in campus"]},
   {"name":"DOVE","position":"member","experience":["Took shot and edited video in ATMOS and ARENA"]},
   {"name":"DEPP","position":"member","experience":["Called about 200 students from 20 different colleges","Visited Several colleges for ATMOS promotion"]},
   {"name":"Movie Club","position":"member","experience":["Got to learn about movie making"]},
   {"name":"VFX","position":"member","experience":null}
   ]

   }*/ var Info;
  //sessionStorage.username=username;
  //console.log(sessionStorage.username);
  jQuery.ajax({
    type: "POST",
    url: 'interface.php',
    datatype:'json',
    data: {functionname: 'show_cv'},
    success:function(data) {
      //  alert(data);
      console.log(data);
      //document.write(data);
      console.log(data);
      Info=JSON.parse(data);


      //console.log(Info);
      var name=document.getElementById("name");
      //Info.name="Student's Union";
      name.innerHTML=Info.name;
      //document.getElementById("name").innerHTML=Info.name;
      document.getElementById("branch").innerHTML=Info.branch;
      document.getElementById("highlight").innerHTML=Info.highlights;
      document.getElementById("phone").innerHTML= + Info.phone;
      document.getElementById("email").innerHTML=Info.email;

      if(Info.official.length>0)
      {
        document.getElementById("official").removeChild(document.getElementById("dept_club"));
        var p= document.createElement("div")
        p.setAttribute("id","dept_club");

        for(i in Info.official)
        {
          x+="<h1>"+Info.official[i].name + "</h1>";
          if(Info.official[i].position!=null)
            x+="<h2>"+Info.official[i].position +"</h2>";
          if(Info.official[i].experience!=null)
          {
            for(j in Info.official[i].experience)
            {
              x+="<li>"+Info.official[i].experience[j] + "</li>" }
          }
        }
      }

      p.innerHTML=x;
      document.getElementById("official").appendChild(p);

      if(Info.freelancer.length>0)
      {
        document.getElementById("freelancer").removeChild(document.getElementById("free"));
        var p= document.createElement("div")
        p.setAttribute("id","free");

        for(i in Info.freelancer)
        {
          y+="<h1>"+Info.freelancer[i].name + "</h1>";
          if(Info.freelancer[i].position!=null)
            y+="<h2>"+Info.freelancer[i].position +"</h2>";
          if(Info.freelancer[i].experience!=null)
          {
            for(j in Info.freelancer[i].experience)
            {
              y+="<li>"+Info.freelancer[i].experience[j] + "</li>" }
          }
        }
      }

      p.innerHTML=y;
      document.getElementById("freelancer").appendChild(p);

    }
  });
  //console.log(Info);
  //console.log(data);
  //Info=JSON.parse(data);
  //console.log(Info);
  //console.log(Info.branch);


}

