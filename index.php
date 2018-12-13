<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>Photography Gallery</title>
  </head>
  <body>
  <div class="container">
  <div class="upfrm">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Select Image File to Upload: <input type="file" name="file" />
      <input type="submit" name="submit" value="Upload" />
    </form>
    </div>
    <div class="gallery">
    <h2>------ PHOTO GALLERY ------</h2>
    </div>
    </div>
    <div class="instructions">
    <p>INSTURCTIONS:</p>
    <ol>
  <li>Click on 'Choose File' to upload a photo.</li>
  <li>Search on your computer for any photo you want. NOTE: Only accepts JPG, JPEG, PNG, GIF, & PDF files.</li>
  <li>Once you have chosen your photo, click upload.</li>
</ol>
</div>
    <?php
   // Include the database configuration file
    include 'dbConfig.php';

   // Get images from the database
    $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC"); ?>
<div class="cards">
<?php
if ($query->num_rows > 0) {
  while ($row = $query->fetch_assoc()) {
    $imageURL = 'uploads/' . $row["file_name"];
    ?>
        
       <img src="<?php echo $imageURL; ?>" alt="" style="width:400px;" />
      
   <?php 
}

} else { ?>
       <p>No image(s) found...</p>
   <?php 
} ?>
</div>
    </body >
      </html >
