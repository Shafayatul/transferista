<template>
    
    <main class=" mx-lg-5 catagoris" >
       <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div class="col-md-6 offset-3">
                    <h1 style="padding-top: 20px; text-align: center;">Review</h1>
                    <hr>
                    <form @submit.prevent="review">
                        
                        <section class='rating-widget'>
        
                        <!-- Rating Stars Box -->
                        <div class='rating-stars text-center'>
                            <ul id='stars'>
                            <li class='star' title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            </ul>
                        </div>
                        
                        <div class='success-box'>
                            <div class='clearfix'></div>
                            <div class='text-message'></div>
                            <input type="hidden" id="star" name="star">
                            <div class='clearfix'></div>
                        </div>              
        
                    </section>

                        <div class="form-group">
                            <textarea class="form-control" name="review" required rows="5" cols="5"></textarea>
                        </div>
                        <input type="hidden" name="order_id">
                        <input type="hidden" name="user_id" >

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        
       </section>
    </main>

</template>
<script>

export default {
    
    methods:{
        review(){
            /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
       
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });
        
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
              $(this).removeClass('hover');
            });
        });
      
      
      /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
        }
        
        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        $("#star").val(ratingValue);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
        
        });

        function responseMessage(msg) {
            $('.success-box').fadeIn(200);  
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }
      
        }
        
    },
    mounted(){

    }
}
</script>
<style scoped>
     #stars{
        float: left !important;
        list-style: none;
    }
    #stars li{
        float: left !important;
    }
    #stars li.star:hover{
        color: yellow;
    }
    .rating-widget{
	padding: 10px;
}
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
.form-horizontal .form-group {
    margin-right: 15px !important;
    margin-left: 15px !important;
}
</style>