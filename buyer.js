function seeDetail(element) {
    // path to address: document.querySelector("#searchResults > div > p:nth-child(3)")
    let loc = element.children[2].innerText
    let form = document.createElement("form")
    let address = document.createElement("input")
    form.setAttribute("method", "post")
    form.setAttribute("action", "./displayCard.php")
    address.setAttribute("name", "location")
    address.setAttribute("value", loc.split(": ")[1])
    form.appendChild(address)
    document.body.appendChild(form)
    form.submit()
}

function addToWishlist() {
    let loc = document.querySelector("h1").innerText
    let form = document.createElement("form")
    let address = document.createElement("input")
    form.setAttribute("method", "post")
    form.setAttribute("action", "./displayCard.php")
    address.setAttribute("name", "wlocation")
    address.setAttribute("value", loc)
    form.appendChild(address)
    document.body.appendChild(form)
    form.submit()
}