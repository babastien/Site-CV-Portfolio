// LOADING SCREEN
function loadingOpacity() {
    document.querySelector(".loading-screen").style.opacity = 0;
}
setTimeout(loadingOpacity, 1500);

function loadingDisplay() {
    document.querySelector(".loading-screen").style.display = "none";
    document.querySelector("body").style.overflow = "visible";
}
setTimeout(loadingDisplay, 2500);

// BURGER MENU
let burger = document.querySelector(".burger");
let menu = document.querySelector("#menu");
let cross = document.querySelector(".cross");
let link = document.querySelectorAll(".link");

burger.addEventListener("click", () => {
    menu.style.top = 0;
    burger.style.display = "none";
    cross.classList.remove("none-important")
})

cross.addEventListener("click", () => {
    menu.style.top = -1000 + "px";
    cross.classList.add("none-important")
    burger.style.display = "block";
})

for (let i = 0 ; i < link.length ; i++) {
    link[i].addEventListener("click", () => {
    menu.style.top = -1000 + "px";
    cross.classList.add("none-important")
    burger.style.display = "block";
})}

// API NASA
let apod = document.querySelector(".apod");
let apodTitle = document.querySelector(".apod-title");

fetch("https://api.nasa.gov/planetary/apod?api_key=LFIIphvc0g9zoHiTF4bbmcuKW9ff3wXcM7znOCZm")
    .then(response => response.json())
    .then(data => nasaDatas(data)) 

function nasaDatas({hdurl, title, explanation}) {
    apod.innerHTML = `<img src="${hdurl}">`
    apodTitle.innerHTML = `
    <p>NASA API : Astronomy Picture of the Day</p>
    <p>Titre : ${title}</p>`

    // apod.addEventListener("mouseover", () => {
    //     apod.innerHTML = `<img src="${hdurl}">` + `<p class="explanation">${explanation}</p>`
    // })
}