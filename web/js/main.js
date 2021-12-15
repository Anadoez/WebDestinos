window.onload=function(){
    console.log("js Ready");
    ponAnuncio();
    $("nav a").on('click',function(e){
        $("nav li.active").removeClass("active");
        $(".sr-only").appendTo($(this));
        $(this).parent().addClass("active");
    });
    var divs=document.getElementsByClassName('anuncio');
    function ponAnuncio(){
        var xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(this.readyState==4&& this.status==200){
                var anuncios=JSON.parse(this.responseText);
                for(var i=0;i<divs.length;i++){
                    creaAnuncio(divs[i],anuncios.link,anuncios.imagen);
                }
            }
        };
        xhr.open('GET','../anuncios/anuncios.json',true);
        xhr.send();
    }
    function creaAnuncio(div,link,imagen){
        var a=document.createElement('a');
        a.setAttribute('href',link);
        var img=document.createElement('img');
        img.setAttribute('src',imagen);
        img.setAttribute('alt','anuncio');
        img.className="img-fluid";
        a.appendChild(img);
        div.appendChild(a);
    }
   
    
}

