<!DOCTYPE html>
<html>
	<head>
		<title>Image Cropper</title>
		<!-- Stylesheet required for image from yui library -->
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/resize/assets/skins/sam/resize.css" />
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/imagecropper/assets/skins/sam/imagecropper.css" />
		<!-- JS required for image from yui library -->
		<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.5.2/build/yahoo-dom-event/yahoo-dom-event.js&2.5.2/build/dragdrop/dragdrop-min.js&2.5.2/build/element/element-beta-min.js&2.5.2/build/resize/resize-beta-min.js&2.5.2/build/imagecropper/imagecropper-beta-min.js&2.
5.2/build/connection/connection-min.js&2.5.2/build/json/json-min.js"></script>
	</head>
	<body>
		<h1> Image Uploader and Cropper </h1>
		<form action="upload.php" enctype="multipart/form-data" method="post" name="uploadForm" id="uploadForm">
			<label>Image : </label><input type="file" name="uploadImage" id="uploadImage" />
			<input type="button" id="uploadButton" value="Upload"/>
		</form>
		<br/>
		<div id="imageContainer"></div>
		<div id="downloadLink"></div>
		<script type="text/javascript">
		
		editor = {
			image: null,
			crop: null,
			
			init: function(image){
				// set our image
				editor.image = image;
							
				// our image cropper from the uploaded image					
				editor.crop = new YAHOO.widget.ImageCropper('yuiImg');
				editor.crop.on('moveEvent', function() {
					// get updated coordinates
					editor.getCroppedImage();
				});
			},
			
			getCroppedImage: function(){
				var coordinates = editor.getCoordinates();
				var url = 'cropper.php?image=' + editor.image + '&cropStartX=' + coordinates.left +'&cropStartY=' + coordinates.top +'&cropWidth=' + coordinates.width +'&cropHeight=' + coordinates.height;
				YAHOO.util.Dom.get('downloadLink').innerHTML = '<a href="' + url + '">download cropped image</a>';		

			},

			getCoordinates: function(){
				return editor.crop.getCropCoords();
			}
		};
		//uploader json object for sending data to upload.php
		uploader = {
			carry: function(){
				// set form
				YAHOO.util.Connect.setForm('uploadForm', true);
				// upload image
				YAHOO.util.Connect.asyncRequest('POST', 'upload.php', {
					upload: function(o){
						// parse our json data
						var jsonData = YAHOO.lang.JSON.parse(o.responseText);
						
						// put image in our image container
						YAHOO.util.Dom.get('imageContainer').innerHTML = '<img id="yuiImg" src="' + jsonData.image + '" width="' + jsonData.width + '" height="' + jsonData.height + '" alt="" />';
								
						// init our editor
						editor.init(jsonData.image); 
									
						// get first cropped image
						editor.getCroppedImage();
					}
				});
			}
		};
		YAHOO.util.Event.on('uploadButton', 'click', uploader.carry);
		</script>
	</body>
</html>


