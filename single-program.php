<?php
/**
 * Template for displaying single Program posts
 */
get_header();

// Get hero settings
$hero_image = get_post_meta(get_the_ID(), '_program_hero_image', true);
$hero_title = get_post_meta(get_the_ID(), '_program_hero_title', true);
$hero_text = get_post_meta(get_the_ID(), '_program_hero_text', true);

// Fallbacks
if (empty($hero_image)) {
    $hero_image = get_template_directory_uri() . '/assets/images/hero-default.jpg';
}
if (empty($hero_title)) {
    $hero_title = get_the_title();
}

// Get section count
$section_count = get_post_meta(get_the_ID(), '_program_section_count', true);
$section_count = $section_count ? intval($section_count) : 3;
if ($section_count < 1) $section_count = 1;
if ($section_count > 10) $section_count = 10;

// Build sections array
$sections = [];
for ($i = 1; $i <= $section_count; $i++) {
    $section_image = get_post_meta(get_the_ID(), "_program_section_image_{$i}", true);
    $section_title = get_post_meta(get_the_ID(), "_program_section_title_{$i}", true);
    $section_text = get_post_meta(get_the_ID(), "_program_section_text_{$i}", true);

    // Only add section if it has at least a title or text
    if (!empty($section_title) || !empty($section_text)) {
        $sections[] = [
            'image' => $section_image ?: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
            'title' => $section_title,
            'text' => $section_text,
        ];
    }
}
?>

<!-- Program Hero Section -->
<section class="program-hero-section">
    <div class="program-hero-container">
        <img src="<?php echo esc_url($hero_image); ?>" class="program-hero-image" alt="<?php echo esc_attr($hero_title); ?>">
        <div class="program-hero-overlay"></div>
        <div class="program-hero-content">
            <div class="container">
                <div class="program-hero-text-wrapper">
                    <h1 class="program-hero-title"><?php echo esc_html($hero_title); ?></h1>
                    <?php if (!empty($hero_text)): ?>
                        <p class="program-hero-text"><?php echo esc_html($hero_text); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Content Sections (Alternating Layout) -->
<?php if (!empty($sections)): ?>
<section class="program-content-section section-pad">
    <div class="container">
        <?php foreach ($sections as $index => $section):
            $is_even = (($index + 1) % 2 === 0);
        ?>
            <div class="program-item <?php echo $is_even ? 'program-item-reverse' : ''; ?>" data-aos="fade-up">
                <div class="row align-items-center g-5 <?php echo $is_even ? 'flex-row-reverse' : ''; ?>">
                    <div class="col-lg-6">
                        <div class="program-content">
                            <?php if (!empty($section['title'])): ?>
                                <h2 class="program-title"><?php echo esc_html($section['title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($section['text'])): ?>
                                <div class="program-text">
                                    <?php echo wp_kses_post(wpautop($section['text'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="program-image">
                            <img src="<?php echo esc_url($section['image']); ?>" alt="<?php echo esc_attr($section['title']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Optional: Display Post Content if exists -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php if (get_the_content()): ?>
        <section class="program-additional-content section-pad">
            <div class="container">
                <div class="program-post-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements
    const programItems = document.querySelectorAll('.program-item');
    programItems.forEach(item => observer.observe(item));
});
</script>

<?php
get_footer();
