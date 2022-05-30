
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {ShrinkHeader()};

    // Get the header wrapper
    let header = document.getElementById("HeaderWrapper");
    let title = document.getElementById("Title");
    let menu = document.getElementById("Menu");
    let social = document.getElementById("SocialMenu");

    let brs = document.getElementsByClassName("HeaderBR");


    // Get the body of the current page
    let body = document.getElementById("Body");

    // Get the offset position of the navbar
    let sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position.
    // Remove "sticky" when you leave the scroll position
    function ShrinkHeader() {
        if (window.pageYOffset > sticky) {
            
          
            header.classList.add("sticky");
            // css modifications on the header when shrinking
            title.style.width = "auto";
            title.style.float = "left";
            title.style.padding = "10px";
            title.style.paddingTop = "10px";

            menu.style.width = "30%";
            menu.style.float = "left";
            menu.style.textAlign = "left";
            menu.style.paddingTop = "38px";

            social.style.width = "20%"
            social.style.paddingTop = "30px";
            social.style.float = "right";
            
            social.style.height = "auto";

             for(var i = 0; i < brs.length; i++) {
                brs[i].style.display = "none";
             }

                // smooth transition
            let headerHeight = header.offsetHeight +"px"; // get the header height in px
            
            body.style.paddingTop = headerHeight; // add header height to body padding 




           
        } else {
           

            // css modifications on the header when expanding
            title.style.width = "100%";
            title.style.float = "none";
            title.style.padding = "0px";
            title.style.paddingBottom = "20px";
            title.style.paddingTop = "20px";

            menu.style.width = "100%";
            menu.style.float = "none";
            menu.style.textAlign = "center";
            menu.style.paddingTop = "0px";

            social.style.width = "100%";
            social.style.paddingTop = "0px";
            social.style.height = "50px";



             for(var i = 0; i < brs.length; i++) {
                brs[i].style.display = "block";
             }

             header.classList.remove("sticky");
             body.style.paddingTop = "0px";
             
        }
}