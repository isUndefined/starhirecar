//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        
        if( !$('#imageInput').val()) //check empty input filed
        {
            $("#img-output").html("Are you kidding me?");
            return false
        }
        
        var fsize = $('#imageInput')[0].files[0].size; //get file size
        var ftype = $('#imageInput')[0].files[0].type; // get file type
        

        //allow only valid image file types 
        switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#img-output").html("<b>"+ftype+"</b> Unsupported file type!");
                return false
        }
        
        //Allowed file size is less than 1 MB (1048576)
        if(fsize>1048576) 
        {
            $("#img-output").html("<b>"+fsize +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
            return false
        }
                
        //$('#submit-btn').hide(); //hide submit button
        $('#loading-img').show(); //hide submit button
        $("#img-output").html("");  
		$("#img-output").html("ok");
		return false;
    }
    else
    {
        //Output error to older browsers that do not support HTML5 File API
        $("#img-output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
        return false;
    }
}