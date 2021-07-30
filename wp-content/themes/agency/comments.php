
<?php
if(post_password_required()){
    return;
}


?>

<div class="comment-list-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h4 class="title"><?php comments_number('0'); ?> Comments</h4>
        </div>
        <div class="col-lg-12">

            <ol class="comment-list">
                <?php foreach ($comments as $comment){

                    ?>
                    <li class="comment">
                        <div class="comment-2">
                            <div class="comment-author vcard">
                                <?php echo get_avatar($comment) ?>
                            </div>
                            <div class="comment-content">
                                <div class="meta">
                                    <h6 class="fn"><?php comment_author(); ?></h6>
                                    <div class="comment-datetime"> <?php comment_date(); ?> </div>
                                </div>
                                <div class="comment-text">
                                    <?php comment_text(); ?>
                                </div>

                                <div class="comment-actions">
                                    <a class="comment-reply-link" href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                }
                the_comments_pagination();
                ?>

                <!-- comment End-->

            </ol>
        </div>
    </div>
</div>


<!--comments from-->

<div class="comment-form-wrap">
    <div class="comment-respond">

        <?php comment_form([
                'comment_field' => '<div class="col-12 mb-3">
                    <textarea name="comment" placeholder="Your Comment"></textarea>
                </div>',
            'fields'           => [
                    'author'   => ' <div class="row"><div class="col-md-6 col-12 mb-3">
                    <input type="text" placeholder="Your Name *" name="author">
                </div>',
                    'email'  => '<div class="col-md-6 col-12 mb-3">
                    <input type="email" placeholder="Email *" name="email">
                </div></div>',

            ],
            'class_submit'     => 'btn btn-primary btn-hover-secondary',
            'label_submit'     => 'Submit',
            'title_reply'     => '<h3 class="title">Leave a Reply</h3>'

        ]); ?>

    </div>
</div>
