<!DOCTYPE html>
<html>
	<head>
		<title>Image Cropper</title>
		<!-- Stylesheet required for image from yui library -->
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/resize/assets/skins/sam/resize.css" />
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/imagecropper/assets/skins/sam/imagecropper.css" />
		<!-- JS required for image from yui library -->
		<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.5.2/build/yahoo-dom-event/yahoo-dom-event.js&;2.5.2/build/dragdrop/dragdrop-min.js&2.5.2/build/element/element-beta-min.js&2.5.2/build/resize/resize-beta-min.js&2.5.2/build/imagecropper/imagecropper-beta-min.js&2.5.2/build/connection/connection-min.js&2.5.2/build/json/json-min.js">
		</script>
	</head>
	<body>
		<h1> Image Uploader and Cropper </h1>
		<form action="upload.php" enctype="multipart/form-data" method="post" name="uploadForm" id="uploadForm">
			<label>Image : </label><input type="file" name="uploadImage" id="uploadImage" />
			<input type="button" id="uploadButton" value="Upload"/>
		</form>
		<div id="imageContainer"></div>
	</body>
</html>


