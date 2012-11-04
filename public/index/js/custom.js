$(".blogajaxurl").live("click", function()
{
var postid=$(this).attr("id").replace("blogpost_","");
$("#theblog").html('<img style=" width: auto; height: auto; " src="images/loader.gif" alt="loading...."/>')
var dataString = 'id=' + postid;
$.ajax
({
type: "POST",
url: "actions/blogpost.php",
data: dataString,
cache: false,
success: function(response)
{
$("#theblog").html(response);
} 
});
});

$(".ajaxback").live("click", function()
{
$("#theblog").html('<img style=" width: auto; height: auto; " src="images/loader.gif" alt="loading...."/>')
$.ajax
({
type: "POST",
url: "actions/bloglist.php",
cache: false,
success: function(response)
{
$("#theblog").html(response);
} 
});
});