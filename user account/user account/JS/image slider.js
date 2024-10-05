
    let currentImageIndex=0; //to set the index of the current image(first image)

    const images=document.querySelectorAll(".image-slider");  //store all the images except for the current imgage, to be displayed in an array

    const total=images.length; //Length of the images array is stored in total

    //The function to make the image slider work

    function imageTransition(){
        images[currentImageIndex].classList.remove("active");  //Hide the current image
        currentImageIndex=(currentImageIndex+1)%total; //Increment the index and make sure when the last image is reached, it loops back to the first image(index 0)
        images[currentImageIndex].classList.add("active");  //Make the next image visible
    }

    setInterval(imageTransition,3000); //To change image every 3 seconds(3ooo ms)

