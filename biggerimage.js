var smallImages = document.querySelectorAll(".small-image");
var largeImageContainers = document.querySelectorAll(".large-image-container");

for (var i = 0; i < smallImages.length; i++) {
  smallImages[i].addEventListener("click", function (event) {
    showLargeImage(event);
  });
  largeImageContainers[i].addEventListener("click", function (event) {
    hideLargeImage(event);
  });
}

function showLargeImage(event) {
  var smallImage = event.target;
  var imageContainer = smallImage.parentNode;
  var largeImageContainer = imageContainer.querySelector(
    ".large-image-container"
  );
  largeImageContainer.style.display = "block";
}

function hideLargeImage(event) {
  var clickedElement = event.target;
  var largeImageContainer = clickedElement.closest(".large-image-container");
  if (
    largeImageContainer &&
    clickedElement !== largeImageContainer &&
    !largeImageContainer.contains(clickedElement)
  ) {
    return;
  }
  largeImageContainer.style.display = "none";
}

// get all img tags with a .jpg or .png src attribute
const jpgPngImages = document.querySelectorAll(
  'img[src$=".jpg"], img[src$=".png"]'
);

// asynchronously convert and replace each image with a .webp version
const replaceImages = async () => {
  await Promise.all(
    Array.from(jpgPngImages).map(async (img) => {
      const response = await fetch(img.src);
      const blob = await response.blob();
      const bitmap = await createImageBitmap(blob);
      const canvas = document.createElement("canvas");
      canvas.width = bitmap.width;
      canvas.height = bitmap.height;
      const ctx = canvas.getContext("2d");
      ctx.drawImage(bitmap, 0, 0);
      const webpBlob = await new Promise((resolve) => {
        canvas.toBlob(
          (blob) => {
            resolve(blob);
          },
          "image/webp",
          1
        );
      });
      const webpURL = URL.createObjectURL(webpBlob);
      img.src = webpURL;
    })
  );
};

// call the function to start replacing images
replaceImages();
