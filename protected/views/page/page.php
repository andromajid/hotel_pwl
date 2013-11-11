<?php if ($page_model !== null): ?>
           

<div class="single_left">
									<h2><?php echo ucfirst($page_model->page_title); ?></h2>
					<div class="row last-row">
								<div class="post">
									<div id="article" style="text-align: justify;">	

            	<p>
                <?php
                echo $page_model->page_content;
                ?>
                  </p>
                                                                        </div>
								</div>						
						</div>                                                              
                   
</div>
    <!-- End Case -->

<?php endif; ?>
