<?php if ($page_model !== null): ?>
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header"><?php echo ucfirst($page_model->page_title); ?></h1>
        </div>

    </div>
    <div class="row">

        <div class="col-lg-12">
            <?php
            echo $page_model->page_content;
            ?>
        </div>

    </div>          

<?php endif; ?>
