<!-- Case -->
					<div class="case">
						<h3>Contact Us</h3>
						<!-- Row -->
							<div class="row">
                <div class="twelve columns">
                  <!--<iframe width="940" height="225" class="map" src="http://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=701+first+ave+sunnyvale+ca&amp;aq=&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=14&amp;iwloc=near&amp;output=embed&amp;hq=&amp;hnear=701+1st+Ave,+Sunnyvale,+California+94089"></iframe>-->
                  <iframe width="940" class="frame" height="225" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps/ms?msa=0&amp;msid=204461521983149243811.0004c2e840731eb490976&amp;ie=UTF8&amp;ll=-7.744178,110.412415&amp;spn=0,0&amp;t=m&amp;iwloc=0004c2e84453412e7eb51&amp;output=embed"></iframe>      
                </div>
              </div>
              <div class="row last-row">
                  <div class="six columns">
                    <h4 class="green">Email Me</h4>
                    <p>Gunakan formulir kontak di bawah ini atau email kami di <a href="mailto:sales@toyagi.net">sales@toyagi.net</a>.</p>
                    <br>
                    <div class="done"></div>
                    <form method="post" action="#" class="form">
                      <table>
                        <tr class="element">
                          <td><label>Name</label></td>
                          <td class="field"><input type="text" name="name" /></td>
                        </tr>
                        <tr class="element">
                          <td><label>Email</label></td>
                          <td class="input"><input type="text" name="email" /></td>
                        </tr>
                        <tr class="element">
                          <td><label>Website</label></td>
                          <td class="input"><input type="text" name="website" /></td>
                        </tr>
                        <tr class="element">
                          <td><label>Message</label></td>
                          <td class="input"><textarea name="comment" class="text textarea" ></textarea></td>
                        </tr>
                      </table>
                      <div class="element">
                        <div class="clearfix"></div>
                        <input type="submit" id="submit" value="Submit"/>
                        <div class="loading"></div>
                      </div>
                      <div class="error"> </div>
                    </form>
                  </div>
                  <div class="six columns">
                    <h4 class="green"><?php echo $office->page_title;?></h4>
                    <?php
                    echo $office->page_content;
                    ?>
                    <h4 class="green"><?php echo $call->page_title;?></h4>
                    <?php
                    echo $call->page_content;
                    ?>
                  </div>
                </div>
					</div>
					<!-- End Case -->
                                        
 <script type="text/javascript">                                       
                                        $(document).ready(function () {
	
        //if submit button is clicked
	$('#submit').click(function () {
		
		//Get the data from all the fields
		var name = $('input[name=name]');
		var email = $('input[name=email]');
		var emailAddress = $('input[name=email]').val();
		var website = $('input[name=website]');
		var comment = $('textarea[name=comment]');
		function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			return pattern.test(emailAddress);
		};
		//Simple validation to make sure user entered something
		//If error found, add highlight class to the text field
		if (name.val() == '') {
			name.addClass('highlight');
			$('.error').replaceWith('<div class="error">Please enter your name</div>');
			$('.error').fadeIn('slow');
			$(name).focus();
			return false;
		} else {
			name.removeClass('highlight');
			$('.error').hide();
		}
		
		if (email.val() == '') {
			email.addClass('highlight');
			$('.error').replaceWith('<div class="error">Please enter your email</div>');
			$('.error').fadeIn('slow');
			$(email).focus();
			return false;
		} else if (!isValidEmailAddress(emailAddress)) {
			email.addClass('highlight');
			$('.error').replaceWith('<div class="error">Please enter a valid email</div>');
			$('.error').fadeIn('slow');
			$(email).focus();
			return false;
		} else {
			email.removeClass('highlight');
			$('.error').hide();
		}
		
		if (comment.val() == '') {
			comment.addClass('highlight');
			$('.error').replaceWith('<div class="error">Please enter your message</div>');
			$('.error').fadeIn('slow');
			$(comment).focus();
			return false;
		} else {
			comment.removeClass('highlight');
			$('.error').hide();
		}
		
		//organize the data properly
		var data = 'name=' + name.val() + '&email=' + email.val() + '&website=' +
			website.val() + '&comment=' + encodeURIComponent(comment.val());
		
		//disabled all the text fields
		$('.text').attr('disabled', 'true');
		
		//show the loading sign
		$('.loading').show();
		
		//start the ajax
		$.ajax({
			//this is the php file that processes the data and send mail
			url : "<?php echo Yii::app()->baseUrl;?>/page/contact_send",
			
			//GET method is used
			type : "GET",
			
			//pass the data
			data : data,
			
			//Do not cache the page
			cache : false,
			
			//success
			success : function (html) {
				//if process.php returned 1/true (send mail success)
				if (html == 1) {
					//hide the form
					$('.form').fadeOut('slow');
					
					//show the success message
					$('.done').fadeIn('slow');
					
					//if process.php returned 0/false (send mail failed)
				} else
					alert('Sorry, unexpected error. Please try again later.');
			}
		});
		
		//cancel the submit button default behaviours
		return false;
	});
});
</script>