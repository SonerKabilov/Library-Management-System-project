function showHide() {
    var selectedOption = document.getElementById("mySelect").value;

    if(selectedOption == "paperbook" || selectedOption == "e-book" ||selectedOption == "audio-book") {
        document.getElementById("author_hidden").style.display = "table-cell";
        document.getElementById("bookgenres_hidden").style.display = "table-cell";
        document.getElementById("editor_hidden").style.display = "none";
        document.getElementById("magazinegenres_hidden").style.display = "none";
        document.getElementById("input_hidden").style.display = "table-cell";
        document.getElementById("genres_hidden").style.display = "table-cell";
        document.getElementById("link_hidden").style.display = "none";
        document.getElementById("mySelect").style.width = "83%";
    } else if(selectedOption == "magazine") {
        document.getElementById("author_hidden").style.display = "none";
        document.getElementById("bookgenres_hidden").style.display = "none";
        document.getElementById("editor_hidden").style.display = "table-cell";
        document.getElementById("magazinegenres_hidden").style.display = "table-cell";
        document.getElementById("input_hidden").style.display = "table-cell";
        document.getElementById("genres_hidden").style.display = "table-cell";
        document.getElementById("link_hidden").style.display = "table-row";
        document.getElementById("mySelect").style.width = "83%"; 
    }

    if(selectedOption == "e-book") {
        document.getElementById("ebook_hidden").style.display = "table-row";
    } else {
        document.getElementById("ebook_hidden").style.display = "none";
    }

    if(selectedOption == "audio-book") {
        document.getElementById("audiobook_hidden").style.display = "table-row";
        document.getElementById("length_hidden").style.display = "table-cell";
        document.getElementById("pages_hidden").style.display = "none";
        document.getElementById("inputlength_hidden").style.display = "table-cell";

    } else {
        document.getElementById("audiobook_hidden").style.display = "none";
        document.getElementById("pages_hidden").style.display = "table-cell";
        document.getElementById("length_hidden").style.display = "none";
        document.getElementById("inputlength_hidden").style.display = "table-cell";
    }
}

function hideDiv() {
    var x = document.getElementById("hide");

    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function displayHeader() {
    var x = document.getElementById("myLinks");

    if (x.className === "header-links") {
        x.className += " responsive";
    } else {
        x.className = "header-links";
    }
}