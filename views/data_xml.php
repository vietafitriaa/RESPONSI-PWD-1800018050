<?php header('Content-type: application/xml; charset="ISO-8859-1"',true); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc><?php echo base_url();?></loc> // url utama
      <priority>0.1</priority>
      <changefreq>daily</changefreq>
   </url>
    // looping menu
    <?php $no = 2; foreach($menu as $res) { ?>
    <url>
      <loc><?php echo base_url().$res; ?></loc> //menu menu yang akan kita daftarkan
      <priority>0.<?php echo $no;?></priority> // urutan xml
      <changefreq>daily</changefreq> / frekuensi harian
    </url>
   <?php $no++; } ?>
</urlset>