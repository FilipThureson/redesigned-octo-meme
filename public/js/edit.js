imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      img.src = URL.createObjectURL(file)
      document.getElementById('saveBtn').style.display = "inline";
    }
}
