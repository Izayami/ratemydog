Cookies.set('RateMyDog', 'True', {expires:2});

var myCookie = Cookies.get("RateMyDog");
var title = document.querySelector("h1");

if(myCookie) {
    title.classList.add("cookie");
}

if (myCookie == "false"){
    title.classList.remove("cookie");
}