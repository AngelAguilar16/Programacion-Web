function verFoto(e){
    const mf = document.querySelector("#modal-foto");
    mf.innerHTML = `
        <img src="${ e.getAttribute("src") }" alt="Foto" onclick="this.parentElement.style = display='none'">
    `;
    mf.style.display = 'block';
}