<?php
/**
 * Template Name: FAQ Page
 * Description: Frequently Asked Questions page template
 */

get_header();

// Get FAQ Hero Section Settings
$faq_hero_image = get_theme_mod('smk_faq_hero_image', get_template_directory_uri() . '/assets/images/hero-default.jpg');
$faq_hero_title = get_theme_mod('smk_faq_hero_title', 'Frequently Asked Questions');
$faq_hero_text = get_theme_mod('smk_faq_hero_text', 'Temukan jawaban atas pertanyaan yang sering diajukan seputar SMK Kesehatan');
?>

<!-- FAQ Hero Section -->
<section class="faq-hero-section">
    <div class="faq-hero-container">
        <img src="<?php echo esc_url($faq_hero_image); ?>" class="faq-hero-image" alt="<?php echo esc_attr($faq_hero_title); ?>">
        <div class="faq-hero-overlay"></div>
        <div class="faq-hero-content">
            <div class="container">
                <div class="faq-hero-text-wrapper">
                    <h1 class="faq-hero-title"><?php echo esc_html($faq_hero_title); ?></h1>
                    <p class="faq-hero-text"><?php echo esc_html($faq_hero_text); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion faq-accordion" id="faqAccordion">
                    <?php
                    // Default FAQ data
                    $default_faqs = [
                        1 => [
                            'question' => 'Apa saja program keahlian yang tersedia di SMK Kesehatan?',
                            'answer' => 'SMK Kesehatan kami menyediakan berbagai program keahlian unggulan di bidang kesehatan, termasuk Keperawatan, Farmasi, Asisten Keperawatan, Teknologi Laboratorium Medik, dan program kesehatan lainnya yang disesuaikan dengan kebutuhan industri kesehatan modern.'
                        ],
                        2 => [
                            'question' => 'Bagaimana sistem pembelajaran di SMK Kesehatan?',
                            'answer' => 'Sistem pembelajaran kami menggabungkan teori dan praktik dengan rasio 40:60. Siswa akan mendapatkan pembelajaran di kelas, praktik di laboratorium yang dilengkapi peralatan modern, serta program magang di rumah sakit dan klinik rekanan kami.'
                        ],
                        3 => [
                            'question' => 'Apa saja persyaratan pendaftaran untuk siswa baru?',
                            'answer' => 'Persyaratan pendaftaran meliputi: ijazah dan SKHUN SMP/MTs (asli dan fotokopi), Kartu Keluarga (fotokopi), Akta Kelahiran (fotokopi), pas foto terbaru ukuran 3x4 (6 lembar), surat keterangan sehat dari dokter, dan mengisi formulir pendaftaran yang telah disediakan.'
                        ],
                        4 => [
                            'question' => 'Apakah tersedia program beasiswa?',
                            'answer' => 'Ya, kami menyediakan berbagai program beasiswa untuk siswa berprestasi dan kurang mampu, termasuk beasiswa penuh, beasiswa parsial, dan beasiswa dari pemerintah. Informasi lengkap dapat diperoleh saat proses pendaftaran atau melalui bagian kesiswaan.'
                        ],
                        5 => [
                            'question' => 'Bagaimana prospek kerja lulusan SMK Kesehatan?',
                            'answer' => 'Lulusan SMK Kesehatan memiliki prospek kerja yang sangat baik di berbagai fasilitas kesehatan seperti rumah sakit, klinik, puskesmas, apotek, laboratorium medis, dan industri farmasi. Kami juga memiliki program kerja sama dengan berbagai institusi kesehatan untuk penempatan kerja lulusan.'
                        ],
                        6 => [
                            'question' => 'Apakah lulusan SMK Kesehatan bisa melanjutkan ke perguruan tinggi?',
                            'answer' => 'Tentu saja! Lulusan SMK Kesehatan kami dapat melanjutkan pendidikan ke jenjang D3, D4, atau S1 di bidang kesehatan. Bahkan banyak lulusan kami yang diterima di perguruan tinggi kesehatan ternama melalui jalur prestasi.'
                        ],
                        7 => [
                            'question' => 'Apa saja fasilitas yang tersedia di sekolah?',
                            'answer' => 'Fasilitas kami meliputi ruang kelas ber-AC, laboratorium keperawatan, laboratorium farmasi, laboratorium komputer, perpustakaan digital, ruang praktik medis dengan peralatan modern, mushola, kantin, dan area parkir yang luas.'
                        ],
                        8 => [
                            'question' => 'Bagaimana sistem praktik kerja lapangan (PKL)?',
                            'answer' => 'Program PKL dilaksanakan selama 6 bulan di semester akhir. Siswa akan ditempatkan di rumah sakit, klinik, atau institusi kesehatan rekanan kami. Selama PKL, siswa akan dibimbing oleh pembimbing dari sekolah dan mentor dari tempat PKL untuk memastikan pembelajaran yang optimal.'
                        ],
                        9 => [
                            'question' => 'Apakah ada program sertifikasi untuk siswa?',
                            'answer' => 'Ya, kami menyelenggarakan program sertifikasi kompetensi sesuai standar BNSP (Badan Nasional Sertifikasi Profesi) untuk berbagai bidang keahlian. Sertifikat ini sangat membantu lulusan dalam memasuki dunia kerja.'
                        ],
                        10 => [
                            'question' => 'Bagaimana cara mendaftar dan kapan waktu pendaftaran?',
                            'answer' => 'Pendaftaran dapat dilakukan secara online melalui website kami atau datang langsung ke sekolah. Pendaftaran dibuka dari bulan Januari hingga Juni setiap tahunnya. Untuk informasi lebih detail, silakan hubungi panitia penerimaan siswa baru melalui kontak yang tertera di website atau media sosial kami.'
                        ]
                    ];

                    for ($i = 1; $i <= 10; $i++):
                        $faq_question = get_theme_mod("smk_faq_question_{$i}", $default_faqs[$i]['question']);
                        $faq_answer = get_theme_mod("smk_faq_answer_{$i}", $default_faqs[$i]['answer']);

                        if (!empty($faq_question) && !empty($faq_answer)):
                    ?>
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faqHeading<?php echo $i; ?>">
                                <button class="accordion-button <?php echo $i === 1 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?php echo $i; ?>" aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>" aria-controls="faqCollapse<?php echo $i; ?>">
                                    <span class="faq-number"><?php echo sprintf('%02d', $i); ?></span>
                                    <span class="faq-question"><?php echo esc_html($faq_question); ?></span>
                                </button>
                            </h2>
                            <div id="faqCollapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : ''; ?>" aria-labelledby="faqHeading<?php echo $i; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body faq-answer">
                                    <?php echo wp_kses_post(wpautop($faq_answer)); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        endif;
                    endfor;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
