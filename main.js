$(document).ready(function(){
  
  oncontextmenu = function(){
    alert("Right Click Not Available.");
    return false;
  }

setTimeout(function() {
  $("#Loader").fadeOut().empty();
}, 5000);

  cat();
  product();
  page();
  cart_count();
  cart_container();
  order();

  function order(){
    $.ajax({
      url: "action.php",
      method: "POST",
      data: {getOrder:1},
      success: function(data){
        $("#get_orders").html(data);
      }
    })
  }

  function cat(){
    $.ajax({
      url: "action.php",
      method: "POST",
      data: {category:1},
      success: function(data){
        $("#get_categories").html(data);
      }
    })
  }

  function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}

  function page(){
    $.ajax({
      url	:	"action.php",
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
			url	:	"action.php",
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
      url		:	"action.php",
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

  $("#search_btn").click(function(){
  var keyword = $("#search").val();
  if(keyword != ""){
    $("#get_product").html("<h3>Loading...</h3>");
    $.ajax({
    url		:	"action.php",
    method	:	"POST",
    data	:	{search:1,keyword:keyword},
    success	:	function(data){
      $("#get_product").html(data);
      if($("body").width() < 480){
        $("body").scrollTop(683);
      }
    }
  })
  }else{
    product();
  }
})

  $("#signup_button").click(function(event){
  		event.preventDefault();
  			$.ajax({
  			url		:	"register.php",
  			method	:	"POST",
  			data	:	$("form").serialize(),
  			success	:	function(data){
  				$("#signup_msg").html(data);
  			}
  		})

	})


  $("#login").click(function(event){
    //alert("Hi");
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:	{userLogin:1,userEmail:email,userPassword:pass},
			success	:function(data){
				if(data == "trueuvwxyz"){
					window.location.href = "profile.php";
          $("#e_msg").html("Succees");
				}
        //$("#e_msg").html(data);
			}
		})
	})

  $("body").delegate("#product","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				$("#product_msg").html(data);
				cart_count();
			}
		})
	})

  function cart_count(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{cart_count:1},
			success	:	function(data){
				$(".badge").html(data);
			}
		})
	}

	function cart_container(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{get_cart_product:1},
			success	:	function(data){
				$("#cart_product").html(data);
			}
		})
	}

  $("#cart_container").click(function(event){
    event.preventDefault();
    $.ajax({
      url	:	"action.php",
      method	:	"POST",
      data	:	{get_cart_product:1},
      success	:	function(data){
        $("#cart_product").html(data);
      }
    })
  })

  cart_checkout();
	function cart_checkout(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{cart_checkout:1},
			success	: function(data){
				$("#cart_checkout").html(data);
        cart_count();
			}
		})
	}

  $("body").delegate(".remove","click",function(event){
    event.preventDefault();
    var pid = $(this).attr("remove_id");
    $.ajax({
      url	:	"action.php",
      method	:	"POST",
      data	:	{removeFromCart:1,removeId:pid},
      success	:	function(data){
        $("#cart_msg").html(data);
        cart_checkout();
      }
    })
  })

  $("img").each(function(){
    $(this)[0].oncontextmenu = function(){
      alert("Right Click Not Available.");
      return false;
    };
  })

    $("#no_download").each(function(){
    $(this)[0].oncontextmenu = function(){
      alert("Right Click Not Available.");
      return false;
    };
  })  

  $("#chngpass_button").click(function(event){
  		event.preventDefault();
  			$.ajax({
  			url		:	"password.php",
  			method	:	"POST",
  			data	:	$("form").serialize(),
  			success	:	function(data){
  				$("#p_msg").html(data);
  			}
  		})

	})

  $("#fpass_btn").click(function(event){
      event.preventDefault();
        $.ajax({
        url   : "resetPassword.php",
        method  : "POST",
        data  : $("form").serialize(),
        success : function(data){
          $("#fp_msg").html(data);
        }
      })

  })

    $("#paybtn").click(function(event){
      event.preventDefault();
        $.ajax({
        url   : "paymentProcess.php",
        method  : "POST",
        data  : $("form").serialize(),
        success : function(data){
          $("#msg").html(data);
        }
      })

  })

})