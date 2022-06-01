
    let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {ShrinkHeader()};

    // Get the header wrapper
    let header = document.getElementById("HeaderWrapper");
    let firstPart = document.getElementById("firstpart");
    let title = document.getElementById("Title");
    let menu = document.getElementById("Menu");
    //let social = document.getElementById("SocialMenu");

    let brs = document.getElementsByClassName("HeaderBR");


    let phraseContainer = document.getElementById("PhraseContainer")
    let phraseDiv = document.getElementById("Phrase");
    let auteurDiv = document.getElementById("Auteur");

    phraseContainer.addEventListener("mouseleave", function( event ) {
        phraseDiv.style.display= "block";
        auteurDiv.style.display= "none";
        
    }, false);
    
    phraseContainer.addEventListener("mouseenter", function( event ) {
        phraseDiv.style.display= "none";
        auteurDiv.style.display= "block";
    }, false);

    

    // Get the body of the current page
    let body = document.getElementById("Body");

    // Get the offset position of the navbar
    let sticky = header.offsetTop;

  
    // Add the sticky class to the header when you reach its scroll position.
    // Remove "sticky" when you leave the scroll position
    function ShrinkHeader() {

        if (width >=800) {
                
        
            if (window.pageYOffset > sticky) {
                
            
                header.classList.add("sticky");
                header.style.height = "95px";

                firstPart.style.height = "70px";
                // css modifications on the header when shrinking
                title.style.width = "fit-content";
                title.style.float = "left";
                title.style.paddingTop = "0px";
                title.style.paddingBottom = "0px";
                title.style.transform = "translate(0%,-50%)";
                title.style.height = "30px";
                title.style.marginTop = "35px";
                title.style.marginLeft = "20px";
                
                // title.style.paddingBottom = "20px";
                // title.style.paddingLeft = "20px";
                // title.style.paddingRight = "10px";

                menu.style.width = "fit-content";
                menu.style.float = "left";
                menu.style.textAlign = "left";
                menu.style.paddingTop = "0px";
                menu.style.paddingBottom = "0";
                menu.style.marginTop = "35px";
                menu.style.transform = "translate(0%,-50%)";
                menu.style.paddingLeft = "10px";

                for(let i = 0; i < brs.length; i++) {
                    brs[i].style.display = "none";
                }

                    // smooth transition
                let headerHeight = header.offsetHeight +"px"; // get the header height in px
                
                body.style.paddingTop = headerHeight; // add header height to body padding 




            
            } else {
            

                // css modifications on the header when expanding
                title.style.width = "fit-content";
                title.style.float = "none";
                title.style.paddingBottom = "5px";
                title.style.marginTop = "20px";
                title.style.transform = "translate(8%,0%)";
                title.style.height = "40px"
                title.style.paddingLeft = "0px";
                title.style.paddingRight = "0px";
                title.style.marginLeft = "auto";

                menu.style.width = "100%";
                menu.style.float = "none";
                menu.style.textAlign = "center";
                menu.style.paddingTop = "15px";
                menu.style.paddingLeft = "0px";
                menu.style.paddingBottom = "10px";
                menu.style.transform = "translate(0%,0%)";
                menu.style.marginTop = "0"
                

                for(let i = 0; i < brs.length; i++) {
                    brs[i].style.display = "block";
                }

                header.classList.remove("sticky");
                header.style.height = "188px";

                firstPart.style.height = "163px";


                body.style.paddingTop = "0px";
                
            }

        }
    }