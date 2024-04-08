<!DOCTYPE html>
<html>
<body>

<form action="uploadProcessor.php" method="post" enctype="multipart/form-data">
  Select a file to upload:
  <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
