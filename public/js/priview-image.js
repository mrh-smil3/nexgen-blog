function priviewImage() {
    let image = document.getElementById("image");
    let imgImage = document.getElementById("img-priview");
    // let imgUpdate = document.getElementById("img-update");

    // image.value = '';
    console.log("priviewImage called");
    console.log("Image files:", image.files);

    // imgUpdate.style.display = "none";

    if (image.files && image.files[0]) {
        imgImage.style.display = "block";

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function (orEvent) {
            console.log("File read result:", orEvent.target.result);
            imgImage.src = orEvent.target.result;
        };
    }
}

function priviewUpdateImage() {
    let image = document.getElementById("image");
    let imgImage = document.getElementById("img-priview");
    let imgUpdate = document.getElementById("img-update");


    image.value = '';
    console.log("priviewUpdateImage called");
    console.log("Image files:", image.files);

    imgUpdate.style.display = "none";
    if (image.files && image.files[0]) {
        imgImage.style.display = "block";

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function (orEvent) {
            console.log("File read result:", orEvent.target.result);
            imgImage.src = orEvent.target.result;
        };
    } else {
        console.error("No file selected or input element not found");
    }
}
