imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      img.src = URL.createObjectURL(file)
      img.style.display = "inline";
      imgInp.style.display = "none";
    }
}
