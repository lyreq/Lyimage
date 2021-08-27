# Welcome to LyImage!
What we can with Lyimage? We can compress image, change height&width or we can change for file path. We can verification for anywhere image file.
Let's look to how use!

 

> First we need calling LyImage.How can this possible? Watch this way.

    include('lyimage.php');
    $LyImage =  new  LyImage("myimage.jpg"); //file path your image file

> If you want learn to image width, you can use this function.

       $getWidth= $LyImage->getWidth();

> If you want learn to image height, you can use this function.

    $getHeight = $LyImage->getHeight();

> If you want verification your image file , you can use this function.

    $check= $LyImage->check(); //return true or false

> If you want to convert your image, you can use this function.

    $convert= $LyImage->convert("myimage.png"); // we must write new exention with file name.
    
    //In addition, if you want compress when converting, watch this way. You should 
    write between 1-100 value for compress when converting.
    $convert= $LyImage->convert("myconvertimage.png",50); 

    

> If you want learn file type, you should use this function.

    // This function for find file type.Like image/jpeg,image/png
    $fileType= $LyImage->fileType();

> If you want learn file extension, you should use this function.

    // This function for find file extension.Like .jpg,.png
    $extension= $LyImage->extension();

> If you want compress image, you should use this function.

    //you must write between 1-100 value for for compress
    $compressImage= $LyImage->compressImage(50); 

> If you want resize image, you should use this function.

    // we must write width and height.
    $resizingImage = $LyImage->resizingImage(250,300); 

> If you want to upload the image anywhere, you should use this way.

	//First parameter is for filename.Other parameter is for where the file will be uploaded.
	//Don't Forget! You must use without extension first parameter.
    $uploadImage = $LyImage->uploadImage("newfilename","../path/");


***If you meet the mistake, you can create issue. I will fix it on my free time.***

