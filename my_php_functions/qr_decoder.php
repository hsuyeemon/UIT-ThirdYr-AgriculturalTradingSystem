<html>
<form enctype="multipart/form-data" action="http://api.qrserver.com/v1/read-qr-code/" method="POST">
<!-- MAX_FILE_SIZE (maximum file size in bytes) must precede the file input field used to upload the QR code image -->
<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
<!-- The "name" of the input field has to be "file" as it is the name of the POST parameter -->
Choose QR code image to read/scan: <input name="file" type="file" />
<input type="submit" value="Read QR code" />
</form>

<p id="demo"></p>

</html>