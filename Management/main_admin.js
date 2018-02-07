$(document).ready(function(){
  cat();
  product();
    page();

  function cat(){
    $.ajax({
      url: "action_admin.php",
      method: "POST",
      data: {category:1},
      success: function(data){
        $("#get_category").html(data);
      }
    })
  }

  function page(){
    $.ajax({
      url	:	"action_admin.php",
      method	:	"POST",
      data	:	{page:1},
      success	:	function(data){
        $("#pageno").html(data);
      }
    })
  }

  $("body").delegate("#page","click",function(){
    var pn = $(this).attr("page");
    $.ajax({
      url	:	"action_admin.php",
      method	:	"POST",
      data	:	{getProduct:1,setPage:1,pageNumber:pn},
      success	:	function(data){
        $("#get_product").html(data);
      }
    })
  })

  $("body").delegate(".category","click",function(event){
    $("#get_product").html("<h3>Loading...</h3>");
    event.preventDefault();
    var cid = $(this).attr('cid');

      $.ajax({
      url		:	"action_admin.php",
      method	:	"POST",
      data	:	{get_seleted_Category:1,cat_id:cid},
      success	:	function(data){
        $("#get_product").html(data);
        if($("body").width() < 480){
          $("body").scrollTop(683);
        }
      }
    })

  })

  function product(){
    $.ajax({
      url: "action_admin.php",
      method: "POST",
      data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
      }
    })
  }

  $("#admin_log").click(function(event){
		event.preventDefault();
		var username = $("#username").val();
		var pass = $("#password").val();
		$.ajax({
			url	:	"adminloginscript.php",
			method:	"POST",
			data	:	{adminLogin:1,username:username,password:pass},
			success	:function(data){
				if(data == "truedata"){
					window.location.href = "inventory_list.php";
				}else{
          $("#e_msg").html(data);
        }
			}
		})
	})

  cat_dropdown();

  function cat_dropdown(){
    $.ajax({
      url: "action_admin.php",
      method: "POST",
      data: {category_dropdown:1},
      success: function(data){
        $("#product_cat").html(data);
      }
    })
  }

  $("body").delegate("#productDelete","click", function(event){
    event.preventDefault();
    var pid = $(this).attr('pid');
    $.ajax({
      url: "action_admin.php",
      method: "POST",
      data: {deleteProduct:1, pid:pid},
      success: function(data){
        $('#product_msg').html(data);
        product();
      }
    })
  })
})
