const navElements = document.querySelectorAll(".tab-el")

navElements.forEach( el=>{
    el.addEventListener("click", (e)=>{
        const target = el.classList[1]
        
        const frame = document.querySelector(".frame")
        frame.setAttribute("src", `dash-elements/${target}.php`)
    })
})