const storage = Firebase.storage().ref();
const inputImage = document.getElementById("imagePost");
const previewImage = document.getElementById("preview-image");

function uuidv4() {
    return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(c) {
        var r = (Math.random() * 16) | 0,
            v = c == "x" ? r : (r & 0x3) | 0x8;
        return v.toString(16);
    });
}

document.getElementById("post-image-upload").onchange = async e => {
    const UID = uuidv4();
    console.log(e.target.files[0]);

    console.log(URL.createObjectURL(e.target.files[0]));

    previewImage.src = URL.createObjectURL(e.target.files[0]);
    previewImage.style.display = "block";
    try {
        await storage.child(`posts/${UID}`).put(e.target.files[0]);

        const url = await storage.child(`posts/${UID}`).getDownloadURL();

        inputImage.value = url;

        alert("Image uploaded");
    } catch (error) {
        console.log(error);
    }
};