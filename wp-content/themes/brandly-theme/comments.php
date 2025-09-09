<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="mt-12">
    <?php if ( have_comments() ) : ?>
        <h3 class="text-2xl md:text-3xl font-bold tracking-tight mb-6">
            <?php
            printf(
                _nx('One response', '%1$s responses', get_comments_number(), 'comments title', 'textdomain'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h3>

        <ol class="space-y-4">
            <?php
            wp_list_comments([
                'style'       => 'ol',
                'avatar_size' => 56,
                'short_ping'  => true,
                'callback'    => function( $comment, $args, $depth ) {
                    $GLOBALS['comment'] = $comment; // WP expects this
                    ?>
                    <li id="comment-<?php comment_ID(); ?>"
                        <?php comment_class('bg-white shadow-sm ring-1 ring-gray-100 p-4 md:p-5'); ?>>
                        <div class="flex items-start gap-4">
                            <div class="shrink-0">
                                <?php echo get_avatar( $comment, 56, '', '', ['class' => 'rounded-full ring-2 ring-[#E9E8FF]'] ); ?>
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                                    <span class="font-semibold text-[#8075F7]">
                                        <?php echo get_comment_author(); ?>
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        <?php echo get_comment_date('F j, Y \a\t H:i'); ?>
                                    </span>
                                    <?php edit_comment_link( __( 'Edit', 'textdomain' ), '<span class="text-[#8075F7]">•</span> <span class="text-xs text-[#8075F7]">', '</span>' ); ?>
                                </div>

                                <?php if ( '0' === $comment->comment_approved ) : ?>
                                    <p class="mt-2 text-sm text-amber-700 bg-amber-50 rounded-lg px-3 py-2 inline-block">
                                        <?php _e( 'Your comment is awaiting moderation.', 'textdomain' ); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="prose prose-sm md:prose-base max-w-none mt-2 text-gray-700">
                                    <?php comment_text(); ?>
                                </div>

                                <div class="mt-3 flex items-center gap-3">
                                <?php
                                    comment_reply_link( array_merge( $args, [
                                        'reply_text' => __( 'Reply', 'textdomain' ),
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth'],
                                        'before'     => '<div>',
                                        'after'      => '</div>',
                                        'add_below'  => 'comment',
                                    ] ) );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Child comments wrapped with a subtle left border for nesting
                        if ( $depth < $args['max_depth'] ) : ?>
                            <div class="mt-4 ml-6 border-l border-gray-100 pl-6 space-y-4">
                                <?php // WP will inject children here. ?>
                            </div>
                        <?php endif; ?>
                    </li>
                    <?php
                }
            ]);
            ?>
        </ol>

        <?php
        // Comment pagination (if enabled)
        the_comments_navigation([
            'prev_text' => '&larr; ' . __( 'Older Comments', 'textdomain' ),
            'next_text' => __( 'Newer Comments', 'textdomain' ) . ' &rarr;',
        ]);
        ?>
    <?php endif; ?>

    <?php if ( comments_open() ) : ?>
    <div class="mt-10">
        <?php
        $fields = [
            'author' =>
                '<p class="comment-form-author">' .
                '<label class="block text-sm font-medium mb-1" for="author">' . __( 'Name', 'textdomain' ) . ( $req ? ' <span class="text-[#8075F7]">*</span>' : '' ) . '</label>' .
                '<input id="author" name="author" type="text" value="' . esc_attr( wp_get_current_commenter()['comment_author'] ?? '' ) . '" ' . ( $req ? 'required' : '' ) . ' class="w-full border border-gray-200 focus:border-[#8075F7] focus:ring-2 focus:ring-[#8075F7]/30 px-4 py-2 outline-none" placeholder="Your name" />' .
                '</p>',

            'email'  =>
                '<p class="comment-form-email mt-4">' .
                '<label class="block text-sm font-medium mb-1" for="email">' . __( 'Email', 'textdomain' ) . ( $req ? ' <span class="text-[#8075F7]">*</span>' : '' ) . '</label>' .
                '<input id="email" name="email" type="email" value="' . esc_attr( wp_get_current_commenter()['comment_author_email'] ?? '' ) . '" ' . ( $req ? 'required' : '' ) . ' class="w-full border border-gray-200 focus:border-[#8075F7] focus:ring-2 focus:ring-[#8075F7]/30 px-4 py-2 outline-none" placeholder="you@brandly.com" />' .
                '</p>',
        ];

        comment_form([
            'title_reply'    => '<span class="text-2xl md:text-3xl font-bold">Leave a Comment</span>',
            'title_reply_before' => '<div class="mb-4">',
            'title_reply_after'  => '</div>',
        
            // Custom "logged in as" text
            'logged_in_as' => '<p class="text-sm text-gray-700">' .
                sprintf(
                    __( 'You are logged in as %1$s. <a href="%2$s" class="text-[#8075F7] hover:text-[#6f62f4] font-medium">Edit profile</a> • <a href="%3$s" class="text-[#8075F7] hover:text-[#6f62f4] font-medium">Log out</a>', 'textdomain' ),
                    esc_html( wp_get_current_user()->display_name ),
                    esc_url( admin_url( 'profile.php' ) ),
                    esc_url( wp_logout_url( get_permalink() ) )
                ) .
                '</p><p class="text-xs text-gray-400 mt-1">Required fields are marked <span class="text-[#8075F7]">*</span></p>',
        
            'comment_field'  =>
                '<p class="comment-form-comment">' .
                '<label class="block text-sm font-medium mb-1" for="comment">' . __( 'Comment', 'textdomain' ) . '</label>' .
                '<textarea id="comment" name="comment" rows="5" required class="w-full border border-gray-200 focus:border-[#8075F7] focus:ring-2 focus:ring-[#8075F7]/30 px-4 py-3 outline-none placeholder:text-gray-400" placeholder="Share your thoughts…"></textarea>' .
                '</p>',
        
            'class_form'     => 'bg-white shadow-sm ring-1 ring-gray-100 p-5 md:p-6',
            'class_submit'   => 'inline-flex items-center justify-center bg-[#8075F7] hover:bg-[#6f62f4] text-white px-5 py-2 font-semibold transition',
            'label_submit'   => __( 'Post Comment', 'textdomain' ),
        ]);
        ?>
    </div>
<?php endif; ?>
</div>
