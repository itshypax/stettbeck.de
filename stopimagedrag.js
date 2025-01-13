var images = document.getElementsByTagName("img");
for (var i = 0; i < images.length; i++) {
  images[i].setAttribute("draggable", "false");
}

var svgElements = document.getElementsByTagName("svg");
for (var i = 0; i < svgElements.length; i++) {
  svgElements[i].addEventListener("dragstart", function (event) {
    event.preventDefault();
  });
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
