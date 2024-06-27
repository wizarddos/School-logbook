const navElements = document.querySelectorAll(".tab-el")
const urlParams = new URLSearchParams(window.location.search);

navElements.forEach( el=>{  
    el.addEventListener("click", (e)=>{
        const target = el.classList[1]
        
        urlParams.set('tab', target);
        const frame = document.querySelector(".frame")
        frame.setAttribute("src", `dash-elements/${target}.php`)
        window.location.search = urlParams;
    })
})