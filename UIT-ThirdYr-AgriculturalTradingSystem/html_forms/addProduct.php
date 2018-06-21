<!DOCTYPE html>
<html>
<head></head>
<body>
<form>
<input type="hidden" name="productID">
Product Name <input type="text" value="" size="40">
</form>
 <br/><br/>
 <form>
Product Price <input type="text" value="" size="40">
 </form><br/><br/>
<form action="multiplefilestore.php" enctype="multipart/form-data" method="post">
 <input type="file" name="files[]" multiple/>
 <input type="submit" name="UPLOAD" value="Upload">
</form><br/><br/>
<form>
   Description <br/><textarea name="message" rows="10" cols="30"> </textarea>             
           
</form><br/><br/>
<form>
 <button type="button" onclick="alert('hee, nin ADD ko click lite pe pok hoke lr tae tl ')">ADD!</button>
 
 <button type="button" onclick="alert('hee, nin EDIT ko click lite pe pok hoke lr tae tl ')">EDIT!</button>
</form>
</body>
</html>

 
 


