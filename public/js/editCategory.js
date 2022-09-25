imgInp1.onchange = evt => {
    const [file] = imgInp1.files
    if (file) {
        newImage1.src = URL.createObjectURL(file)
    }
}

imgInp2.onchange = evt => {
    const [file] = imgInp2.files
    if (file) {
        newImage2.src = URL.createObjectURL(file)
    }
}

imgInp3.onchange = evt => {
    const [file] = imgInp3.files
    if (file) {
        newImage3.src = URL.createObjectURL(file)
    }
}

imgInp4.onchange = evt => {
    const [file] = imgInp4.files
    if (file) {
        newImage4.src = URL.createObjectURL(file)
    }
}