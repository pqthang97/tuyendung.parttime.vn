<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-thumbnail">
                        <?php tuyendung_thumbnail('thumbnail'); ?>
        </div>
        <header class="entry-header">
                        <?php tuyendung_entry_header(); ?>
                        <?php tuyendung_entry_meta() ?>
        </header>
                <div class="entry-content">
                        <?php tuyendung_entry_content(); ?>
                        <?php ( is_single() ? tuyendung_entry_tag() : '' ); ?>
                </div>
</article>